<?php

class Rvy_Revision_Workflow_UI {
    function do_notifications( $notification_type, $status, $post_arr, $args ) {
        global $revisionary, $current_user;

        if ( 'pending-revision' != $notification_type ) {
            return;
        }

        $defaults = array( 'revision_id' => 0, 'published_post' => false, 'object_type' => '', 'selected_recipients' => array() );
        $args = array_merge( $defaults, $args );
        foreach( array_keys($defaults) as $var ) { $$var = $args[$var]; }

        if ( ! $published_post ) {
            return;
        }

        // Support workaround to prevent notification when an Administrator or Editor voluntarily creates a pending revision
        if (defined('REVISIONARY_LIMIT_ADMIN_NOTIFICATIONS') && agp_user_can('edit_post', $published_post->ID, 0, ['skip_revision_allowance' => true])) {
            return;
        }

        if ( $revisionary->doing_rest && $revisionary->rest->is_posts_request && ! empty( $revisionary->rest->request ) ) {
            $post_arr = array_merge( $revisionary->rest->request->get_params(), $post_arr );
        }

        $recipient_ids = [];

        $admin_notify = rvy_get_option( 'pending_rev_notify_admin' );
        $author_notify = rvy_get_option( 'pending_rev_notify_author' );
        if ( ( $admin_notify || $author_notify ) && $revision_id ) {
            $type_obj = get_post_type_object( $object_type );
            $type_caption = $type_obj->labels->singular_name;
            $post_arr['post_type'] = $published_post->post_type;
            
            $blogname = wp_specialchars_decode( get_option('blogname'), ENT_QUOTES );
            
            $title = sprintf( __('[%s] Pending Revision Notification', 'revisionary'), $blogname );
            
            $message = sprintf( __('A pending revision to the %1$s "%2$s" has been submitted.', 'revisionary'), $type_caption, $post_arr['post_title'] ) . "\r\n\r\n";

            $message .= sprintf( __('It was submitted by %1$s.', 'revisionary' ), $current_user->display_name ) . "\r\n\r\n";

            if ( $revision_id ) {
                $revision = get_post($revision_id);

                if (rvy_get_option('revision_preview_links') || current_user_can('administrator') || is_super_admin()) {
                    $preview_link = rvy_preview_url($revision);
                    $message .= __( 'Preview and Approval: ', 'revisionary' ) . $preview_link . "\r\n\r\n";
                }

                $message .= __( 'Revision Queue: ', 'revisionary' ) . admin_url("admin.php?page=revisionary-q&published_post={$published_post->ID}") . "\r\n\r\n";
                
                $message .= __( 'Edit Revision: ', 'revisionary' ) . admin_url("post.php?action=edit&post={$revision_id}") . "\r\n";
            }

            if ( $admin_notify ) {
                // establish the publisher recipients
                $recipient_ids = self::getRecipients('rev_submission_notify_admin', compact('type_obj', 'published_post'));
                
                if ( ( 'always' != $admin_notify ) && $selected_recipients ) {
                    // intersect default recipients with selected recipients
                    $recipient_ids = array_intersect( $selected_recipients, $recipient_ids );
                }
                
                if ( defined( 'RVY_NOTIFY_SUPER_ADMIN' ) && is_multisite() ) {
                    $super_admin_logins = get_super_admins();
                    foreach( $super_admin_logins as $user_login ) {
                        if ( $super = new WP_User($user_login) ) {
                            $recipient_ids []= $super->ID;
                        }
                    }
                }
            }

            if ( $author_notify ) {
                if (function_exists('get_multiple_authors')) {
                    $author_ids = [];
                    foreach(get_multiple_authors($published_post) as $_author) {
                        $author_ids []= $_author->ID;
                    }	
                } else {
                    $author_ids = [$published_post->post_author];
                }

                if ('always' != $author_notify) {
                    $author_ids = $selected_recipients ? array_intersect($author_ids, $selected_recipients) : [];
                }

                $recipient_ids = array_merge($recipient_ids, $author_ids);
            }

            if ( $recipient_ids ) {
                global $wpdb;
                $results = $wpdb->get_results( 
                    "SELECT ID, user_email FROM $wpdb->users WHERE ID IN ('" 
                    . implode("','", array_map('intval', $recipient_ids)) 
                    . "')" 
                );
                
                foreach($results as $row) {
                    $to_addresses[$row->ID] = $row->user_email;
                }

                $to_addresses = array_unique($to_addresses);
            } else {
                $to_addresses = array();
            }

            foreach ( $to_addresses as $user_id => $address ) {
                if (!empty($author_ids) && in_array($user_id, $author_ids)) {
                    $notification_class = 'rev_submission_notify_author';
                } elseif (!empty($monitor_ids) && in_array($user_id, $monitor_ids)) {
                    $notification_class = 'rev_submission_notify_monitor';
                } else {
                    $notification_class = 'rev_submission_notify_admin';
                }

                rvy_mail(
                    $address, 
                    $title, 
                    $message, 
                    [
                        'revision_id' => $revision_id, 
                        'post_id' => $published_post->ID, 
                        'notification_type' => $notification_type,
                        'notification_class' => $notification_class,
                    ]
                );
            }
        }
    }

    function get_revision_msg( $revision, $args = array() ) {
        global $current_user;

        $defaults = array( 'post_id' => 0, 'post_arr' => array(), 'object_type' => '', 'future_date' => null );
        $args = array_merge( $defaults, (array) $args );
        foreach( array_keys($defaults) as $var ) { $$var = $args[$var]; }
        
        if ( ! $revision ) {
            $msg = __('Sorry, an error occurred while attempting to save your revision.', 'revisionary'); 
        } else {
            if ( is_scalar ( $revision ) ) {
                //$revision = wp_get_post_revision( $revision );
                $revision = get_post($revision);
            }

            if ( ! $post_arr ) {
                $post_arr = (array) $revision;
            }

            if ( ! $post_id ) {
                $post_id = rvy_post_id($revision->ID);
            }

            if ( ! $object_type ) {
                if ( $post = get_post( $post_id ) ) {
                    $object_type = $post->post_type;
                }
            }

            if ( null === $future_date ) {
                $future_date = $post_arr && ! empty( $post_arr['post_date_gmt'] ) && strtotime($post_arr['post_date_gmt'] ) > agp_time_gmt();
            }

            $manage_link = $this->get_manage_link( $object_type );
            
            switch( $revision->post_status ) {
            case 'future-revision':
                rvy_delete_post_meta( $post_id, "_new_scheduled_revision_{$current_user->ID}" );  // clear the flag which triggered a redirect from Gutenberg editor

                $msg = __('Your modification was saved as a Scheduled Revision.', 'revisionary') . ' ';
            
                $msg .= '<ul>';
                
                if (rvy_get_option('revision_preview_links') || current_user_can('administrator') || is_super_admin()) {
                    $preview_link = rvy_preview_url($revision);
                    $msg .= '<li>' . sprintf( '<a href="%s">' . __( 'Preview it', 'revisionary' ) . '</a>', $preview_link );
                    $preview_link = remove_query_arg('preview_id', $preview_link);
                    $msg .= '<br /><br /></li><li>';
                }

                //$msg .= sprintf( '<a href="%s">' . __('Go to Revisions Manager', 'revisionary') . '</a>', "admin.php?page=rvy-revisions&amp;revision={$revision->ID}&amp;action=view" );
                //$msg .= '<br /><br /></li><li>';
                $msg .= sprintf( '<a href="%s">' . __('Keep editing the revision', 'revisionary') . '</a>', "post.php?post={$revision->ID}&amp;action=edit" );
                $msg .= '<br /><br /></li><li>';
                $msg .= sprintf( '<a href="%s">' . __('Go back to schedule another revision', 'revisionary') . '</a>', "javascript:history.back(1);" );
                $msg .= '<br /><br /></li><li>';
                $msg .= sprintf( '<a href="%s">' . __('View Revision Queue', 'revisionary') . '</a>', "admin.php?page=revisionary-q&published_post=$post_id" );
                $msg .= '<br /><br /></li><li>';
                $msg .= sprintf( '<a href="%s">' . $manage_link->caption . '</a>', admin_url($manage_link->uri) );
                $msg .= '</li></ul>';

                break;

            case 'pending-revision':
            default:
                // support alternate message if revision was submitted by an Editor or Administrator
                if (defined('REVISIONARY_LIMIT_ADMIN_NOTIFICATION')) {
                    $editor_roles = [];
                    
                    foreach (['REVISIONARY_ALTERNATE_SUBMISSION_CAPTION_ROLES', 'RVY_MONITOR_ROLES', 'SCOPER_MONITOR_ROLES'] as $const) {
                        if (defined($const)) {
                            $editor_roles = array_map('trim', explode(',', constant($const)));
                            break;
                        }
                    }

                    if (empty($editor_roles)) {
                        $editor_roles = ['editor', 'administrator'];
                    }

					// Administrator role might be excluded from revision notification, but as a self-approving revisor should still get the abbreviated submission caption. 
                    if (!defined('REVISIONARY_ALTERNATE_SUBMISSION_CAPTION_ROLES')) {
                        $editor_roles []= 'administrator';
                    }

                    if ($user = new WP_User($revision->post_author)) {
                        if (array_intersect($user->roles, $editor_roles)) {
                            $use_editor_message = true;
                        }
                    }
                }

                if (!empty($use_editor_message)) {
                    $msg = __('Your modification has been saved.', 'revisionary') . ' <br />';
                } else {
                    $msg = __('Your modification has been saved for editorial review.', 'revisionary') . ' <br /><br />';
                    
                    if ( $future_date ) {
                        $msg .= __('If approved by an editor, it will be published on the date you specified.', 'revisionary') . ' ';
                    } else {
                        $msg .= __('It will be published when an editor approves it.', 'revisionary') . ' ';
                    }
                }

                clean_post_cache($revision->ID);
                
                $msg .= '<ul>';

                if (rvy_get_option('revision_preview_links') || current_user_can('administrator') || is_super_admin()) {
                    $preview_link = rvy_preview_url($revision);
                    $preview_link = remove_query_arg('preview_id', $preview_link);

                    $msg .= '<li>';
                    $msg .= sprintf( '<a href="%s">' . __( 'Preview it', 'revisionary' ) . '</a>', $preview_link );
                    $msg .= '<br /><br /></li>';
                }

                $msg .= '<li>';
                $msg .= sprintf( '<a href="%s">' . __('Keep editing the revision', 'revisionary') . '</a>', "post.php?post={$revision->ID}&amp;action=edit" );
                $msg .= '<br /><br /></li><li>';
                
                if ( $future_date ) {
                    $msg .= sprintf( '<a href="%s">' . __('Go back to submit another revision', 'revisionary') . '</a>', "javascript:history.back(1);" );
                    $msg .= '<br /><br /></li><li>';
                }

                $msg .= sprintf( '<a href="%s">' . __('View Revision Queue', 'revisionary') . '</a>', "admin.php?page=revisionary-q&published_post=$post_id" );
                $msg .= '<br /><br /></li><li>';

                $msg .= sprintf( '<a href="%s">' . $manage_link->caption . '</a>', admin_url($manage_link->uri) );
                $msg .= '</li></ul>';
            }
        }

        return $msg;
    }

    function get_manage_link( $post_type ) {
		$arr = (object) array();
		
		// maintaining these for back compat with existing translations
		if ( 'post' == $post_type ) {
			$arr->uri = 'edit.php';
			$arr->caption = __( 'Return to Edit Posts', 'revisionary' );
		} elseif ( 'page' == $post_type ) {
			$arr->uri = "edit.php?post_type=$post_type";
			$arr->caption = __( 'Return to Edit Pages', 'revisionary' );
		} else {
			$wp_post_type = get_post_type_object( $post_type );
			$arr->uri = "edit.php?post_type=$post_type";
			$arr->caption = sprintf( __( 'Return to Edit %s', 'revisionary' ), $wp_post_type->labels->name );
		}
		
		return $arr;
    }
    
    static function getRecipients($notification_class, $args) {
        $defaults = ['type_obj' => false, 'published_post' => false];
        foreach(array_keys($defaults) as $key) {
            if (!empty($args[$key])) {
                $$key = $args[$key];
            } else {
                return [];
            }
        }

        $recipient_ids = [];

        switch ($notification_class) {
            case 'rev_submission_notify_admin' :
            case 'rev_approval_notify_admin' :

                if ( defined('RVY_CONTENT_ROLES') && ! defined('SCOPER_DEFAULT_MONITOR_GROUPS') && ! defined('REVISIONARY_LIMIT_ADMIN_NOTIFICATIONS') ) {
                    global $revisionary;
                    
                    $monitor_groups_enabled = true;
                    $revisionary->content_roles->ensure_init();
                    
                    $recipient_ids = $revisionary->content_roles->get_metagroup_members( 'Pending Revision Monitors' );
                    
                    if ( $type_obj ) {
                        $revisionary->skip_revision_allowance = true;
                        $post_publisher_ids = $revisionary->content_roles->users_who_can( $type_obj->cap->edit_post, $published_post->ID, array( 'cols' => 'id', 'user_ids' => $recipient_ids ) );
                        $revisionary->skip_revision_allowance = false;
                        $recipient_ids = array_intersect( $recipient_ids, $post_publisher_ids );
                    }

                    $monitor_ids = $recipient_ids;
                }

                if (!$recipient_ids && (empty($monitor_groups_enabled) || ! defined('RVY_FORCE_MONITOR_GROUPS'))) {
                    require_once(ABSPATH . 'wp-admin/includes/user.php');
                    
                    if ( defined( 'SCOPER_MONITOR_ROLES' ) ) {
                        $use_wp_roles = SCOPER_MONITOR_ROLES;
                    } else {
                        $use_wp_roles = ( defined( 'RVY_MONITOR_ROLES' ) ) ? RVY_MONITOR_ROLES : 'administrator,editor';
                    }

                    $use_wp_roles = str_replace( ' ', '', $use_wp_roles );
                    $use_wp_roles = explode( ',', $use_wp_roles );
                    
                    foreach ( $use_wp_roles as $role_name ) {
                        $search = new WP_User_Query( "search=&fields=id&role=$role_name" );
                        $recipient_ids = array_merge( $recipient_ids, $search->results );
                        $recipient_ids = array_unique($recipient_ids);
                    }

                    if ( $recipient_ids && $type_obj ) {
                        foreach( $recipient_ids as $key => $user_id ) {
                            $_user = new WP_User($user_id);
                            $reqd_caps = map_meta_cap( $type_obj->cap->edit_post, $user_id, $published_post->ID );
                            
                            if ( array_diff( $reqd_caps, array_keys( array_intersect( $_user->allcaps, array( true, 1, '1' ) ) ) ) ) {
                                unset( $recipient_ids[$key] );
                            }
                        }
                    }
                }

                break;
            default:
        } // end switch notification_class

        return $recipient_ids;
    }
}
