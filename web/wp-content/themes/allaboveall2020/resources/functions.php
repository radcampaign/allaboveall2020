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

// remove comments
add_action( 'init', 'comments_init' );
function comments_init() {
  remove_post_type_support( 'post', 'comments' );
  remove_post_type_support( 'resource', 'comments' );
  remove_post_type_support( 'campaign', 'comments' );
  remove_post_type_support( 'event', 'comments' );
  remove_post_type_support( 'action', 'comments' );
}

// Logo
function mytheme_setup() {
  add_theme_support('custom-logo');
}

add_action('after_setup_theme', 'mytheme_setup');

// menu locations
function register_my_menu() {
  register_nav_menu('footer_navigation',__( 'Footer Menu' ));
  register_nav_menu('header_social',__( 'Header Social' ));
  register_nav_menu('footer_social',__( 'Footer Social' ));
}

add_action( 'init', 'register_my_menu' );

// image sizes
function wpdocs_theme_setup() {
  //add_image_size( 'post_related_image', 500, 350, TRUE );
  //add_image_size( 'post_featured_image', 2000, 800, TRUE );
}

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

function create_post_type_event() {
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
  'name' => _x('events', 'plural'),
  'singular_name' => _x('event', 'singular'),
  'menu_name' => _x('Event', 'admin menu'),
  'name_admin_bar' => _x('Event', 'admin bar'),
  'add_new' => _x('Add New event', 'add new'),
  'add_new_item' => __('Add New event'),
  'new_item' => __('New event'),
  'edit_item' => __('Edit events'),
  'view_item' => __('View events'),
  'all_items' => __('All events'),
  'search_items' => __('Search events'),
  'not_found' => __('No events found.'),
  );
  $args = array(
  'supports' => $supports,
  'labels' => $labels,
  'public' => true,
  'query_var' => true,
  'rewrite' => array('slug' => 'event'),
  'has_archive' => true,
  'hierarchical' => false,
  );
  register_post_type('event', $args);
}

add_action('init', 'create_post_type_resource');
add_action('init', 'create_post_type_updates');
add_action('init', 'create_post_type_action');
add_action('init', 'create_post_type_event');


/** create taxonomies **/

function add_campaign_taxonomies() {
  $labels = array(
    'name' => _x( 'campaigns', 'taxonomy general name' ),
    'singular_name' => _x( 'Campaign', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search campaigns' ),
    'all_items' => __( 'All campaigns' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit Campaign' ), 
    'update_item' => __( 'Update Campaign' ),
    'add_new_item' => __( 'Add New Campaign' ),
    'new_item_name' => __( 'New Campaign Name' ),
    'menu_name' => __( 'Campaign' ),
  );    
 
// Now register the taxonomy
 
  register_taxonomy('campaign',array('resource', 'update', 'action', 'post', 'page'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'Campaign' ),
  ));
}

function add_statelocality_taxonomies() {
  $labels = array(
    'name' => _x( 'State/Locality', 'taxonomy general name' ),
    'singular_name' => _x( 'State/Locality', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search state/localities' ),
    'all_items' => __( 'All state/localities' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit state/locality' ), 
    'update_item' => __( 'Update state/locality' ),
    'add_new_item' => __( 'Add New State/Locality' ),
    'new_item_name' => __( 'New state/locality Name' ),
    'menu_name' => __( 'State/Locality' ),
  );    
 
// Now register the taxonomy
 
  register_taxonomy('state/locality',array('resource', 'update', 'action', 'post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'state/locality' ),
  ));
}

function add_author_taxonomy() {
  $labels = array(
    'name' => _x( 'Author', 'taxonomy general name' ),
    'singular_name' => _x( 'Author', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search author' ),
    'all_items' => __( 'All authors' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit author' ), 
    'update_item' => __( 'Update author' ),
    'add_new_item' => __( 'Add New author' ),
    'new_item_name' => __( 'New author Name' ),
    'menu_name' => __( 'Author' ),
  );    
 
// Now register the taxonomy
 
  register_taxonomy('author',array('resource', 'update', 'action', 'post', 'page'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'Campaign' ),
  ));
}

add_action( 'init', 'add_campaign_taxonomies', 0 );
add_action( 'init', 'add_statelocality_taxonomies', 0 );
add_action( 'init', 'add_author_taxonomy', 0 );
