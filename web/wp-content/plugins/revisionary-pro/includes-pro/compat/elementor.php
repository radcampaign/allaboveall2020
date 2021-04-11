<?php
if( basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME']) )
	die( 'This page cannot be called directly.' );

/**
 * @package     PublishPress\Revisions\RevisionaryElementor
 * @author      PublishPress <help@publishpress.com>
 * @copyright   Copyright (c) 2020 PublishPress. All rights reserved.
 * @license     GPLv2 or later
 * @since       1.0.0
 */
class RevisionaryElementor
{	
    private $buffered_queries = [];

    function __construct() {
        add_action('elementor/widgets/widgets_registered', [$this, 'elementorMonitorQueries']);
        add_filter('revisionary_detect_id', [$this, 'elementorDetectID'], 10, 2);
        add_filter('revisionary_do_submission_redirect', [$this, 'elementorDisableSubmissionRedirect']);
        add_filter('elementor/documents/ajax_save/return_data', [$this, 'elementorRevisionSubmittedNotice']);
        add_action('wp_print_scripts', [$this, 'elementorFrontStyle']);
    }

    function elementorMonitorQueries() {
        add_filter('query', [$this, 'actAdjustElementorUpdateQuery']);
        add_action('shutdown', [$this, 'elementorHandleBufferedQueries']);
    }

    function actAdjustElementorUpdateQuery($qry) {
        global $revisionary, $wpdb;

        if (strpos($qry, "WHERE `post_id`") && strpos($qry, "AND `meta_key` = '_elementor_data'")) {
            $this->buffered_queries []= $qry;
            $qry = str_replace("AND `meta_key` = '_elementor_data'", "AND 1=2 AND `meta_key` = '_elementor_data'", $qry);
        
        } elseif (0 === strpos($qry, "UPDATE `$wpdb->posts`") && strpos($qry, "`ID` = 0 WHERE `ID` =")) {
            $this->buffered_queries []= $qry;
            $qry = str_replace("WHERE `ID` =", "WHERE 1=2 AND `ID` =", $qry);
        } 

        return $qry;
    }

    function elementorHandleBufferedQueries() {
        global $revisionary, $wpdb;

        remove_filter('query', [$this, 'actAdjustElementorUpdateQuery']);

        foreach( $this->buffered_queries as $qry ) {
            $matched = false;
            foreach($revisionary->last_revision as $post_id => $revision_id) {
                if (strpos($qry, "WHERE `post_id` = $post_id AND `meta_key` = '_elementor_data'")) {
                    // The Update query pertained to a post that was being edited for revision submission; modify it to update revision instead.
                    $qry = str_replace("WHERE `post_id` = $post_id AND `meta_key` = '_elementor_data'", "WHERE `post_id` = $revision_id AND `meta_key` = '_elementor_data'", $qry);
                    break;
                }

                if (0 === strpos($qry, "UPDATE `$wpdb->posts`") && strpos($qry, "`ID` = 0 WHERE `ID` = $post_id")) {
                    // The Update query pertained to a post that was being edited for revision submission, so allow it to be skipped.
                    $matched = true;
                    break;
                }
            }

            if (!$matched) {
                // The Update query did not pertain to a post that was being edited for revision submission, so execute it now.
                $wpdb->query($qry);
            }
        }

        if (class_exists('Elementor\Plugin')) {
            foreach($revisionary->last_revision as $post_id => $revision_id) {
                // \Elementor\Plugin::$instance->db->save_plain_text($revision_id);

                // Switch $dynamic_tags to parsing mode = remove.
                $dynamic_tags = \Elementor\Plugin::$instance->dynamic_tags;
                $parsing_mode = $dynamic_tags->get_parsing_mode();
                $dynamic_tags->set_parsing_mode('remove');

                //$plain_text = $this->get_plain_text( $post_id );
                $meta = $wpdb->get_var("SELECT meta_value FROM $wpdb->postmeta WHERE post_id = '$revision_id' AND meta_key = '_elementor_data'");
                
                if ( is_string( $meta ) && ! empty( $meta ) ) {
                    $meta = json_decode( $meta, true );
                }
        
                if ( empty( $meta ) ) {
                    $meta = [];
                }

                $plain_text = \Elementor\Plugin::$instance->db->get_plain_text_from_data($meta);

                wp_update_post(
                    [
                        'ID' => $revision_id,
                        'post_content' => $plain_text,
                    ]
                );

                // Restore parsing mode.
                $dynamic_tags->set_parsing_mode( $parsing_mode );
            }
        }
    }

    function elementorDetectID($id, $args) {
        $args = (array) $args;

        if (!empty($args['is_ajax']) && !empty($_REQUEST['action']) && ('elementor_ajax' == $_REQUEST['action']) && !empty($_REQUEST['editor_post_id']) && did_action('elementor/db/before_save')) {
            if (!empty($_REQUEST['actions'])) {
                $requests = json_decode( stripslashes( $_REQUEST['actions'] ), true );

                if (!empty($requests['save_builder'])) {
                    $id = $_REQUEST['editor_post_id'];
                }
            }
        }

        return $id;
    }

    function elementorDisableSubmissionRedirect($redirect) {
        if (defined('DOING_AJAX') && DOING_AJAX && !empty($_REQUEST['action']) && ('elementor_ajax' == $_REQUEST['action']) && !empty($_REQUEST['editor_post_id']) && did_action('elementor/db/before_save')) {
            $redirect = false;
        }

        return $redirect;
    }

    function elementorRevisionSubmittedNotice() {
        global $revisionary;

        if (!empty($revisionary->last_revision)) {
            $this->elementorHandleBufferedQueries();
            throw new \Exception(__('Revision Submitted', 'revisionary'));
        }
    }

    function elementorFrontStyle() {
        if ($post_id = rvy_detect_post_id()) {
            if (!agp_user_can('edit_post', $post_id, '', ['skip_revision_allowance' => true])) {
                ?>
                <script type="text/javascript">
				/* <![CDATA[ */
					setInterval(function() {
                        var publishButton = document.getElementById("elementor-panel-saver-button-publish-label");

                        if (publishButton !== null) {
                            publishButton.innerHTML = '<?php _e('Revise', 'revisionary');?>';
                        }
					}, 100);
				/* ]]> */
				</script>
                <?php
            }
        }
    }
}