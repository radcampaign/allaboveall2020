<?php
global $pagenow, $revisionary;

add_action( 'init', '_rvy_post_edit_ui' );

if (defined('REVISIONARY_PRO_VERSION')) {
	require_once(RVY_ABSPATH . '/includes-pro/admin-load.php');
	new RevisionaryProAdmin();
}

if ( in_array( $pagenow, array( 'edit.php', 'post.php', 'post-new.php', 'plugins.php' ) ) ) { 
	add_action( 'all_admin_notices', '_rvy_intro_notice' );

	if (get_site_transient('_revisionary_1x_migration')) {
		add_action( 'all_admin_notices', '_rvy_migration_notice' );
	}
}

function _rvy_post_edit_ui() {
	global $pagenow, $revisionary;

	if ( in_array( $pagenow, array( 'post.php', 'post-new.php' ) ) ) {
		if ( $pagenow == 'post.php' ) {
			require_once( dirname(__FILE__).'/post-edit_rvy.php' );
			$revisionary->post_edit_ui = new RvyPostEdit();
		}

		if ($revisionary->isBlockEditorActive()) {
			require_once( dirname(__FILE__).'/post-edit-block-ui_rvy.php' );
		}
	}
}

function rvy_load_textdomain() {
	if ( defined('RVY_TEXTDOMAIN_LOADED') )
		return;

	load_plugin_textdomain('revisionary', false, dirname(plugin_basename(REVISIONARY_FILE)) . '/languages');

	define('RVY_TEXTDOMAIN_LOADED', true);
}

function rvy_admin_init() {
	// @todo: clean up "Restore Revision" URL on Diff screen
	if (!empty($_GET['amp;revision']) && !empty($_GET['amp;action']) && !empty($_GET['amp;_wpnonce'])) {
		$_GET['revision'] = $_GET['amp;revision'];
		$_GET['action'] = $_GET['amp;action'];
		$_GET['_wpnonce'] = $_GET['amp;_wpnonce'];
		$_REQUEST['revision'] = $_REQUEST['amp;revision'];
		$_REQUEST['action'] = $_REQUEST['amp;action'];
		$_REQUEST['_wpnonce'] = $_REQUEST['amp;_wpnonce'];
	}

	if ( ! empty($_POST['rvy_submit']) || ! empty($_POST['rvy_defaults']) ) {
		require_once( RVY_ABSPATH . '/submittee_rvy.php');	
		$handler = new Revisionary_Submittee();
	
		if ( isset($_POST['rvy_submit']) ) {
			$sitewide = isset($_POST['rvy_options_doing_sitewide']);
			$customize_defaults = isset($_POST['rvy_options_customize_defaults']);
			$handler->handle_submission( 'update', $sitewide, $customize_defaults );
			
		} elseif ( isset($_POST['rvy_defaults']) ) {
			$sitewide = isset($_POST['rvy_options_doing_sitewide']);
			$customize_defaults = isset($_POST['rvy_options_customize_defaults']);
			$handler->handle_submission( 'default', $sitewide, $customize_defaults );
		}
		
	} elseif (isset($_REQUEST['action2']) && !empty($_REQUEST['page']) && ('revisionary-q' == $_REQUEST['page']) && !empty($_REQUEST['post'])) {
		$doaction = (!empty($_REQUEST['action']) && !is_numeric($_REQUEST['action'])) ? sanitize_key($_REQUEST['action']) : sanitize_key($_REQUEST['action2']);

		check_admin_referer('bulk-revision-queue');

		$sendback = remove_query_arg( array('trashed', 'untrashed', 'approved_count', 'published_count', 'deleted', 'locked', 'ids', 'posts', '_wp_nonce', '_wp_http_referer'), wp_get_referer() );
	
		if ( 'delete_all' == $doaction ) {
			// Prepare for deletion of all posts with a specified post status (i.e. Empty trash).
			$post_status = preg_replace('/[^a-z0-9_-]+/i', '', sanitize_key($_REQUEST['post_status']));
			// Verify the post status exists.
			if ( get_post_status_object( $post_status ) ) {
				$post_ids = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_type=%s AND post_status = %s", $post_type, $post_status ) );
			}
			$doaction = 'delete';
		} elseif ( isset( $_REQUEST['media'] ) ) {
			$post_ids =  array_map('intval', (array) $_REQUEST['media']);
		} elseif ( isset( $_REQUEST['ids'] ) ) {
			$post_ids =  array_map('intval', explode( ',', $_REQUEST['ids'] ));
		} elseif ( !empty( $_REQUEST['post'] ) ) {
			$post_ids = array_map('intval', $_REQUEST['post']);
		}
	
		if ( !isset( $post_ids ) ) {
			exit;
		}
	
		switch ( $doaction ) {
			case 'approve_revision': // If pending revisions has a requested publish date, schedule it, otherwise schedule for near future. Leave currently scheduled revisions alone. 
			case 'publish_revision': // Schedule all selected revisions for near future publishing.
				$approved = 0;
				$is_administrator = current_user_can('administrator');
	
				require_once( dirname(__FILE__).'/revision-action_rvy.php');
	
				foreach ((array) $post_ids as $post_id) {
					if (!$revision = get_post($post_id)) {
						continue;
					}
					
					if (!rvy_is_revision_status($revision->post_status)) {
						continue;
					}
					
					if ( !$is_administrator 
					&& !agp_user_can($type_obj->cap->edit_post, rvy_post_id($revision->ID), '', ['skip_revision_allowance' => true])
					) {
						if (count($post_ids) == 1) {
							wp_die( __('Sorry, you are not allowed to approve this revision.', 'revisionary') );
						} else {
							continue;
						}
					}
	
					if (('future-revision' == $revision->post_status) && ('publish_revision' == $doaction)) {
						if (rvy_revision_publish($revision->ID)) {
							$approved++;
						}
					} else {
						if (rvy_revision_approve($revision->ID)) {
							$approved++;
						}
					}
				}
	
				if ($approved) {
					$arg = ('publish_revision' == $doaction) ? 'published_count' : 'approved_count';
					$sendback = add_query_arg($arg, $approved, $sendback);
				}
	
				break;
	
			case 'unschedule_revision' :
				$unscheduled = 0;
				$is_administrator = current_user_can('administrator');
	
				require_once( dirname(__FILE__).'/revision-action_rvy.php');

				foreach ((array) $post_ids as $post_id) {
					if (!$revision = get_post($post_id)) {
						continue;
					}
					
					if ('future-revision' != $revision->post_status) {
						continue;
					}
					
					if ( !$is_administrator 
					&& !agp_user_can($type_obj->cap->edit_post, rvy_post_id($revision->ID), '', ['skip_revision_allowance' => true])
					) {
						if (count($post_ids) == 1) {
							wp_die( __('Sorry, you are not allowed to approve this revision.', 'revisionary') );
						} else {
							continue;
						}
					}
						
					if (rvy_revision_unschedule($revision->ID)) {
						$unscheduled++;
					}
				}

				if ($unscheduled) {
					$arg = 'unscheduled_count';
					$sendback = add_query_arg($arg, $unscheduled, $sendback);
				}

				break;

			case 'delete':
				$deleted = 0;
				foreach ( (array) $post_ids as $post_id ) {
					if ( ! $revision = get_post($post_id) )
						continue;
					
					if ( ! rvy_is_revision_status($revision->post_status) )
						continue;
					
					if ( ! current_user_can('administrator') && ! current_user_can( 'delete_post', rvy_post_id($revision->ID) ) ) {  // @todo: review Administrator cap check
						if (('pending-revision' != $revision->post_status) || !rvy_is_post_author($revision)) {	// allow submitters to delete their own still-pending revisions
							wp_die( __('Sorry, you are not allowed to delete this revision.', 'revisionary') );
						}
					} 
	
					if ( !wp_delete_post($post_id) )
						wp_die( __('Error in deleting.') );
	
					$deleted++;
				}
				$sendback = add_query_arg('deleted', $deleted, $sendback);
				break;
	
			default:
				$sendback = apply_filters( 'handle_bulk_actions-' . get_current_screen()->id, $sendback, $doaction, $post_ids );
				break;
		}
	
		if ($sendback) {
			$sendback = remove_query_arg( array('action', 'action2', '_wp_http_referer', '_wpnonce', 'tags_input', 'post_author', 'comment_status', 'ping_status', '_status', 'post', 'bulk_edit', 'post_view'), $sendback );
			$sendback = str_replace('#038;', '&', $sendback);	// @todo Proper decode
			wp_redirect($sendback);
		}

	// don't bother with the checks in this block unless action arg was passed
	} elseif ( ! empty($_GET['action']) || ! empty($_POST['action']) ) {
		if (false !== strpos(urldecode($_SERVER['REQUEST_URI']), 'admin.php') && !empty($_REQUEST['page']) && ('rvy-revisions' == $_REQUEST['page'])) {
			if ( ! empty($_GET['action']) && ('restore' == $_GET['action']) ) {
				require_once( dirname(__FILE__).'/revision-action_rvy.php');	
				add_action( 'wp_loaded', 'rvy_revision_restore' );
		
			} elseif ( ! empty($_GET['action']) && ('delete' == $_GET['action']) ) {
				require_once( dirname(__FILE__).'/revision-action_rvy.php');	
				add_action( 'wp_loaded', 'rvy_revision_delete' );
				
			} elseif ( ! empty($_GET['action']) && ('approve' == $_GET['action']) ) {
				require_once( dirname(__FILE__).'/revision-action_rvy.php');	
				add_action( 'wp_loaded', 'rvy_revision_approve' );
				
			} elseif ( ! empty($_GET['action']) && ('publish' == $_GET['action']) ) {
				require_once( dirname(__FILE__).'/revision-action_rvy.php');	
				add_action( 'wp_loaded', 'rvy_revision_publish' );

			} elseif ( ! empty($_POST['action']) && ('bulk-delete' == $_POST['action'] ) ) {
				require_once( dirname(__FILE__).'/revision-action_rvy.php');	
				add_action( 'wp_loaded', 'rvy_revision_bulk_delete' );
			}
		}
		
	} // endif action arg passed

	if (defined('REVISIONARY_PRO_VERSION') && !empty($_REQUEST['rvy_ajax_settings'])) {
		include_once(RVY_ABSPATH . '/includes-pro/pro-activation-ajax.php');
	}

	if (defined('REVISIONARY_PRO_VERSION') && !empty($_REQUEST['rvy_refresh_updates'])) {
		do_action('revisionary_refresh_updates');
	}

	if (!empty($_REQUEST['rvy_refresh_done']) && empty($_POST)) {
		if (current_user_can('activate_plugins')) {
			$url = admin_url('update-core.php');
			wp_redirect($url);
		}
	}
}

function rvy_intro_message($abbreviated = false) {
	
	$guide_link = sprintf(
		__('For more details on setting up PublishPress Revisions, %sread this guide%s.', 'revisionary'),
		'<a href="https://publishpress.com/documentation/revisionary-start" target="_blank">',
		'</a>'
	);

	return ($abbreviated) ? $guide_link : sprintf(
		__('<strong>Welcome to PublishPress Revisions!</strong> Here&apos;s how it works:%s<li>"Contributors" can submit revisions to their published posts.</li><li>"Revisors" can submit revisions to posts and pages published by others.</li><li>"Authors", "Editors" and "Administrators" can approve revisions or schedule their own revisions.</li>%s%s%s', 'revisionary'),
		'<ul style="list-style-type:disc; padding-left:10px;margin-bottom:0">',
		'</ul><p>',
		$guide_link,
		'</p>'
	);
}

function rvy_migration_message() {
	return sprintf(
		__('<strong>Revisionary is now PublishPress Revisions!</strong> Note the new Revisions menu and %sRevision Queue%s screen, where Pending and Scheduled Revisions are listed. %s', 'revisionary'),
		'<a href="' . admin_url('admin.php?page=revisionary-q') . '">',
		'</a>',
		'<div style="margin-top:10px">' . rvy_intro_message(true) . '</div>'
	);
}

function _rvy_intro_notice() {
	if ( current_user_can( 'edit_users') ) {
		rvy_dismissable_notice( 'intro_revisor_role', rvy_intro_message());
	}
}

function _rvy_migration_notice() {
	if ( current_user_can( 'edit_users') ) {
		rvy_dismissable_notice( 'revisionary_migration', rvy_migration_message());
	}
}

function rvy_dismissable_notice( $msg_id, $message ) {
	$dismissals = (array) rvy_get_option( 'dismissals' );

	if ( ! isset( $dismissals[$msg_id] ) ) :
		$class = 'rvy-admin-notice rvy-admin-notice-plugin';
		?>
		<div class='updated rvy-notice' class='<?php echo $class;?>' id='rvy_dashboard_message'>
		<span style="float:right"><a href="javascript:void(0);" onclick="RvyDismissNotice();"><?php _e("Dismiss", "revisionary") ?></a></span>
		<?php echo $message ?></div>
		<script type="text/javascript">
			function RvyDismissNotice(){
				jQuery("#rvy_dashboard_message").slideUp();
				jQuery.post(ajaxurl, {action:"rvy_dismiss_msg", msg_id:"<?php echo $msg_id ?>", cookie: encodeURIComponent(document.cookie)});
			}
		</script>
	<?php 
	endif;
}

function rvy_get_post_revisions($post_id, $status = 'inherit', $args = '' ) {
	global $wpdb;
	
	$defaults = array( 'order' => 'DESC', 'orderby' => 'post_modified_gmt', 'use_memcache' => true, 'fields' => COLS_ALL_RVY, 'return_flipped' => false );
	$args = wp_parse_args( $args, $defaults );
	
	foreach( array_keys( $defaults ) as $var ) {
		$$var = ( isset( $args[$var] ) ) ? $args[$var] : $defaults[$var];
	}
	
	if (!in_array( 
		$status, 
		array_merge(rvy_revision_statuses(), array('inherit')) 
	) ) {
		return [];
	}

	if ( COL_ID_RVY == $fields ) {
		// performance opt for repeated calls by user_has_cap filter
		if ( $use_memcache ) {
			static $last_results;
			
			if ( ! isset($last_results) )
				$last_results = array();
		
			elseif ( isset($last_results[$post_id][$status]) )
				return $last_results[$post_id][$status];
		}
		
		if ('inherit' == $status) {
			$revisions = $wpdb->get_col(
				$wpdb->prepare(
					"SELECT ID FROM $wpdb->posts WHERE post_type = 'revision' AND post_parent = %d AND post_status = %s",
					$post_id,
					$status
				)
			);
		} else {
			$revisions = $wpdb->get_col(
				$wpdb->prepare(
				"SELECT ID FROM $wpdb->posts "
				. " INNER JOIN $wpdb->postmeta pm_published ON $wpdb->posts.ID = pm_published.post_id AND pm_published.meta_key = '_rvy_base_post_id'"
					. " WHERE pm_published.meta_value = %s AND post_status = %s",
					$post_id,
					$status
				)
			);
		}

		if ( $return_flipped )
			$revisions = array_fill_keys( $revisions, true );

		if ( $use_memcache ) {
			if ( ! isset($last_results[$post_id]) )
				$last_results[$post_id] = array();
				
			$last_results[$post_id][$status] = $revisions;
		}	
			
	} else {
		$order_clause = "ORDER BY $orderby $order";

		if ('inherit' == $status) {
			$revisions = $wpdb->get_results(
				$wpdb->prepare(
					"SELECT * FROM $wpdb->posts WHERE post_type = 'revision' AND post_parent = %d AND post_status = %s $order_clause",
					$post_id,
					$status
				)
			);
		} else {
			$revisions = $wpdb->get_results(
				$wpdb->prepare(
				"SELECT * FROM $wpdb->posts "
				. " INNER JOIN $wpdb->postmeta pm_published ON $wpdb->posts.ID = pm_published.post_id AND pm_published.meta_key = '_rvy_base_post_id'"
					. " WHERE pm_published.meta_value = %d AND post_status = %s $order_clause",
					$post_id,
					$status
				)
			);
		}
	}

	return $revisions;
}
