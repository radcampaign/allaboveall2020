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
  add_theme_support( 'post-thumbnails' );
}

add_action('after_setup_theme', 'mytheme_setup');

// menu locations
function register_my_menu() {
  register_nav_menu('main_menu',__('Main Menu Location'));
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

/** create taxonomies **/
add_action( 'init', 'add_campaign_taxonomies', 0 );
add_action( 'init', 'add_statelocality_taxonomies', 0 );

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
 
  register_taxonomy('campaign',array('resource', 'news', 'update', 'action_item', 'post', 'page'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'campaign' ),
  ));
}

function add_statelocality_taxonomies() {
  $labels = array(
    'name' => _x( 'State', 'taxonomy general name' ),
    'singular_name' => _x( 'State', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search state/localities' ),
    'all_items' => __( 'All state/localities' ),
    'parent_item' => null,
    'parent_item_colon' => null,
    'edit_item' => __( 'Edit State' ), 
    'update_item' => __( 'Update State' ),
    'add_new_item' => __( 'Add New State' ),
    'new_item_name' => __( 'New State Name' ),
    'menu_name' => __( 'State' ),
  );    
 
// Now register the taxonomy
 
  register_taxonomy('state',array('resource', 'news', 'update', 'action_item', 'post'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'state' ),
  ));
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

function create_post_type_news() {
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
  'name' => _x('news', 'plural'),
  'singular_name' => _x('news', 'singular'),
  'menu_name' => _x('News', 'admin menu'),
  'name_admin_bar' => _x('news', 'admin bar'),
  'add_new' => _x('Add New news', 'add new'),
  'add_new_item' => __('Add New news'),
  'new_item' => __('New news'),
  'edit_item' => __('Edit news'),
  'view_item' => __('View news'),
  'all_items' => __('All news'),
  'search_items' => __('Search news'),
  'not_found' => __('No news found.'),
  );
  $args = array(
  'supports' => $supports,
  'labels' => $labels,
  'public' => true,
  'query_var' => true,
  'rewrite' => array('slug' => 'news'),
  'has_archive' => true,
  'hierarchical' => false,
  );
  register_post_type('news', $args);
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
  'name' => _x('Updates', 'plural'),
  'singular_name' => _x('Update', 'singular'),
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
  'name' => _x('action items', 'plural'),
  'singular_name' => _x('action item', 'singular'),
  'menu_name' => _x('Action items', 'admin menu'),
  'name_admin_bar' => _x('Action item', 'admin bar'),
  'add_new' => _x('Add New', 'add new'),
  'add_new_item' => __('Add New action item'),
  'new_item' => __('New action item'),
  'edit_item' => __('Edit action item'),
  'view_item' => __('View action item'),
  'all_items' => __('All action items'),
  'search_items' => __('Search action items'),
  'not_found' => __('No action item found.'),
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
  register_post_type('action_item', $args);
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
  'edit_item' => __('Edit event'),
  'view_item' => __('View event'),
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
//add_action('init', 'create_post_type_event');
add_action('init', 'create_post_type_news');

// Removes from admin menu
add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
// Removes from post and pages
add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}
// Removes from admin bar
function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

function wpb_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');

/*
* Callback function to filter the MCE settings
*/
 
function my_mce_before_init_insert_formats( $init_array ) {  
 
// Define the style_formats array
 
  $style_formats = array(  
/*
* Each array child is a format with it's own settings
* Notice that each array has title, block, classes, and wrapper arguments
* Title is the label which will be visible in Formats menu
* Block defines whether it is a span, div, selector, or inline style
* Classes allows you to define CSS classes
* Wrapper whether or not to add a new block-level element around any selected elements
*/ 
      array(  
          'title' => 'Green Button',  
          'block' => 'div',  
          'classes' => 'green-button',
          'wrapper' => true,
      ),
      array(  
          'title' => 'Black Button',  
          'block' => 'div',  
          'classes' => 'black-button',
          'wrapper' => true,
      ),
      array(  
          'title' => 'Headline Uppercase',  
          'block' => 'div',  
          'classes' => 'text-uppercase',
          'wrapper' => true,
      ),
  );  
  // Insert the array, JSON ENCODED, into 'style_formats'
  $init_array['style_formats'] = json_encode( $style_formats );  
   
  return $init_array;  
   
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );


// shortcoodes
function register_shortcodes() {
  add_shortcode('stateDropdown', 'shortcode_state_dropdown');
}
add_action( 'init', 'register_shortcodes' );

function shortcode_state_dropdown($atts, $content = null) {
  global $wp;
  $statetermlist = get_terms( array( 
    'taxonomy' => 'state',
    'orderby' => 'name',
    'order' => 'ASC',
    'hide_empty' => false,
  ));
  $statedropdown = '<div class="select select-page">
  <select id="dynamic_select" class="form-control">
    <option>Select a State</option>';
  foreach($statetermlist as $state) {
    $statedropdown = $statedropdown.'<option value="/state/'.$state->slug.'">'.$state->name.'</option>';
  }
  $statedropdown = $statedropdown.'</select></div>';
  return $statedropdown;
  wp_reset_postdata();
}

function trim_excerpt($text)
{
  return str_replace(' [...]', '', $text);
}

function shortcode_updates_list($atts, $content = null) {
  //global $post;
  $atts = shortcode_atts(
    array(
      'postid' => '',
    ),
    $atts
  );
  $q = new WP_Query(array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'p' => esc_attr($atts['postid']),
    'posts_per_page' => 1,
  ));
  while ($q->have_posts()) {
      $q->the_post();
      $posttitle = get_the_title();
      $postid = get_the_ID();
      $exert = get_the_excerpt();
      $postlink = get_the_permalink();

      $first = strtolower(get_the_author_meta('first_name'));
      $last = strtolower(get_the_author_meta('last_name'));
      $authid = get_the_author_meta('ID');
      $authorname = get_the_author();

      $attachment_id = get_post_thumbnail_id();
      $img_atts = wp_get_attachment_image_src( $attachment_id, $default );
      $img_src = $img_atts[0];
  }
  wp_reset_postdata();
  return '<div class="hero" style="background: url(\''.$img_src.'\'); background-size: cover; background-repeat: no-repeat; background-position: 25% 25%;">
          <div class="text-overlay">
            <div class="container"><div class="row"><div class="col-md-12">
            <h2 class="post-title display-1"><a href="'.$postlink.'" class="title-link">'.$posttitle.'</a></h2>
            <div class="author">'.$authorname.'</div>
            <div class="post-content">
              <p>'.trim_excerpt($exert).'</p>
              <a href="'.$postlink.'" class="link-white read-more">Read More <i class="fas fa-arrow-right"></i></a>
            </div>
            </div></div></div></div>
          </div>';
}
