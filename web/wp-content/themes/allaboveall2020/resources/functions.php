<?php

/**
 * Do not edit anything in this file unless you know what you're doing
 */

use Roots\Sage\Config;
use Roots\Sage\Container;

/**
 * Helper function for prettying up errors
 * @param string $message
 * @param string $subtitle
 * @param string $title
 */
$sage_error = function ($message, $subtitle = '', $title = '') {
    $title = $title ?: __('Sage &rsaquo; Error', 'sage');
    $footer = '<a href="https://roots.io/sage/docs/">roots.io/sage/docs/</a>';
    $message = "<h1>{$title}<br><small>{$subtitle}</small></h1><p>{$message}</p><p>{$footer}</p>";
    wp_die($message, $title);
};

/**
 * Ensure compatible version of PHP is used
 */
if (version_compare('7.1', phpversion(), '>=')) {
    $sage_error(__('You must be using PHP 7.1 or greater.', 'sage'), __('Invalid PHP version', 'sage'));
}

/**
 * Ensure compatible version of WordPress is used
 */
if (version_compare('4.7.0', get_bloginfo('version'), '>=')) {
    $sage_error(__('You must be using WordPress 4.7.0 or greater.', 'sage'), __('Invalid WordPress version', 'sage'));
}

/**
 * Ensure dependencies are loaded
 */
if (!class_exists('Roots\\Sage\\Container')) {
    if (!file_exists($composer = __DIR__.'/../vendor/autoload.php')) {
        $sage_error(
            __('You must run <code>composer install</code> from the Sage directory.', 'sage'),
            __('Autoloader not found.', 'sage')
        );
    }
    require_once $composer;
}

/**
 * Sage required files
 *
 * The mapped array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 */
array_map(function ($file) use ($sage_error) {
    $file = "../app/{$file}.php";
    if (!locate_template($file, true, true)) {
        $sage_error(sprintf(__('Error locating <code>%s</code> for inclusion.', 'sage'), $file), 'File not found');
    }
}, ['helpers', 'setup', 'filters', 'admin']);

/**
 * Here's what's happening with these hooks:
 * 1. WordPress initially detects theme in themes/sage/resources
 * 2. Upon activation, we tell WordPress that the theme is actually in themes/sage/resources/views
 * 3. When we call get_template_directory() or get_template_directory_uri(), we point it back to themes/sage/resources
 *
 * We do this so that the Template Hierarchy will look in themes/sage/resources/views for core WordPress themes
 * But functions.php, style.css, and index.php are all still located in themes/sage/resources
 *
 * This is not compatible with the WordPress Customizer theme preview prior to theme activation
 *
 * get_template_directory()   -> /srv/www/example.com/current/web/app/themes/sage/resources
 * get_stylesheet_directory() -> /srv/www/example.com/current/web/app/themes/sage/resources
 * locate_template()
 * ├── STYLESHEETPATH         -> /srv/www/example.com/current/web/app/themes/sage/resources/views
 * └── TEMPLATEPATH           -> /srv/www/example.com/current/web/app/themes/sage/resources
 */
array_map(
    'add_filter',
    ['theme_file_path', 'theme_file_uri', 'parent_theme_file_path', 'parent_theme_file_uri'],
    array_fill(0, 4, 'dirname')
);
Container::getInstance()
    ->bindIf('config', function () {
        return new Config([
            'assets' => require dirname(__DIR__).'/config/assets.php',
            'theme' => require dirname(__DIR__).'/config/theme.php',
            'view' => require dirname(__DIR__).'/config/view.php',
        ]);
    }, true);

// create content types
function create_post_type_resource() {
  $supports = array(
  'title', // post title
  'editor', // post content
  'author', // post author
  'thumbnail', // featured images
  'excerpt', // post excerpt
  'custom-fields', // custom fields
  'comments', // post comments
  'revisions', // post revisions
  'post-formats', // post formats
  );
  $labels = array(
  'name' => _x('resources', 'plural'),
  'singular_name' => _x('resource', 'singular'),
  'menu_name' => _x('Resource', 'admin menu'),
  'name_admin_bar' => _x('resource', 'admin bar'),
  'add_new' => _x('Add New resource', 'add new'),
  'add_new_item' => __('Add New resource'),
  'new_item' => __('New resource'),
  'edit_item' => __('Edit resource'),
  'view_item' => __('View resource'),
  'all_items' => __('All resource'),
  'search_items' => __('Search resource'),
  'not_found' => __('No resource found.'),
  );
  $args = array(
  'supports' => $supports,
  'labels' => $labels,
  'public' => true,
  'query_var' => true,
  'rewrite' => array('slug' => 'resource'),
  'has_archive' => true,
  'hierarchical' => false,
  );
  register_post_type('resource', $args);
}

function create_post_type_updates() {
  $supports = array(
  'title', // post title
  'editor', // post content
  'author', // post author
  'thumbnail', // featured images
  'excerpt', // post excerpt
  'custom-fields', // custom fields
  'comments', // post comments
  'revisions', // post revisions
  'post-formats', // post formats
  );
  $labels = array(
  'name' => _x('updates', 'plural'),
  'singular_name' => _x('updates', 'singular'),
  'menu_name' => _x('Updates', 'admin menu'),
  'name_admin_bar' => _x('Updates', 'admin bar'),
  'add_new' => _x('Add New', 'add new'),
  'add_new_item' => __('Add New updates'),
  'new_item' => __('New updates'),
  'edit_item' => __('Edit updates'),
  'view_item' => __('View updates'),
  'all_items' => __('All updates'),
  'search_items' => __('Search updates'),
  'not_found' => __('No updates found.'),
  );
  $args = array(
  'supports' => $supports,
  'labels' => $labels,
  'public' => true,
  'query_var' => true,
  'rewrite' => array('slug' => 'updates'),
  'has_archive' => true,
  'hierarchical' => false,
  );
  register_post_type('update', $args);
}

function create_post_type_action() {
  $supports = array(
  'title', // post title
  'editor', // post content
  'author', // post author
  'thumbnail', // featured images
  'excerpt', // post excerpt
  'custom-fields', // custom fields
  'comments', // post comments
  'revisions', // post revisions
  'post-formats', // post formats
  );
  $labels = array(
  'name' => _x('actions', 'plural'),
  'singular_name' => _x('action', 'singular'),
  'menu_name' => _x('Action', 'admin menu'),
  'name_admin_bar' => _x('Action', 'admin bar'),
  'add_new' => _x('Add New', 'add new'),
  'add_new_item' => __('Add New action'),
  'new_item' => __('New action'),
  'edit_item' => __('Edit action'),
  'view_item' => __('View action'),
  'all_items' => __('All action'),
  'search_items' => __('Search action'),
  'not_found' => __('No action found.'),
  );
  $args = array(
  'supports' => $supports,
  'labels' => $labels,
  'public' => true,
  'query_var' => true,
  'rewrite' => array('slug' => 'action'),
  'has_archive' => true,
  'hierarchical' => false,
  );
  register_post_type('action', $args);
}

add_action('init', 'create_post_type_resource');
add_action('init', 'create_post_type_updates');
add_action('init', 'create_post_type_action');

// create taxonomies

function add_campaign_taxonomies() {
  $labels = array(
    'name' => _x( 'campaigns', 'taxonomy general name' ),
    'singular_name' => _x( 'Topic', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search campaigns' ),
    'all_items' => __( 'All campaigns' ),
    'parent_item' => __( 'Parent Campaign' ),
    'parent_item_colon' => __( 'Parent Campaign:' ),
    'edit_item' => __( 'Edit Campaign' ), 
    'update_item' => __( 'Update Campaign' ),
    'add_new_item' => __( 'Add New Campaign' ),
    'new_item_name' => __( 'New Campaign Name' ),
    'menu_name' => __( 'Campaign' ),
  );    
 
// Now register the taxonomy
 
  register_taxonomy('campaign',array('post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'Campaign' ),
  ));
}
add_action( 'init', 'add_campaign_taxonomies', 0 );
