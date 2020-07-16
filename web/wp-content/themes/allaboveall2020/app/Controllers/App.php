<?php

namespace App\Controllers;

use Sober\Controller\Controller;
use WP_Query;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
    }

    public function stateTerms() {
      global $wp;
      $statetermlist = get_terms( array( 
        'taxonomy' => 'state',
        'orderby' => 'name',
        'order' => 'ASC',
        'hide_empty' => false,
      ));
      return $statetermlist;
    }

    public static function nav($menu) {

      global $wp;
      $pageurl = home_url( $wp->request ).'/';

      $locations = get_nav_menu_locations();
      $menu_name = wp_get_nav_menu_object( $locations[ $menu ] );
      $menuitems = wp_get_nav_menu_items( $menu_name->term_id, array( 'order' => 'DESC' ) );
      $menulist = json_decode(json_encode($menuitems), true);
      $navitems = array();
      $kids = array();

      foreach ($menulist as $delta => $menu_item) {
        $active = '';
        if($menu_item['url'] == $pageurl) {
          $active = 'active';
        }
        if(!empty($menu_item['menu_item_parent'])) {
          foreach($navitems as $key => &$value)
          { 
            if ($value['id'] == $menu_item['menu_item_parent']) {
                $navitems[$key]['children'] = 'yes';
                $navitems[$key]['child'][] = array('title' => $menu_item['title'], 'url' => $menu_item['url'], 'id' => $menu_item['ID'], 'level' => '2', 'parent' => $menu_item['menu_item_parent'], 'active' => $active);
                break;
            } 
          }
        }
        else {
          $navitems[] = array('title' => $menu_item['title'], 'url' => $menu_item['url'], 'id' => $menu_item['ID'], 'level' => '1', 'children' => 'no', 'active' => $active);
        }
      }
      
      //echo "<hr><pre>"; print_r($navitems); echo "</pre><hr>";
      return $navitems;
    }


    public static function title()
    {
        if (is_home()) {
            if ($home = get_option('page_for_posts', true)) {
                return get_the_title($home);
            }
            return __('Latest Posts', 'sage');
        }
        if (is_archive()) {
            return get_the_archive_title();
        }
        if (is_search()) {
            return sprintf(__('Search Results for %s', 'sage'), get_search_query());
        }
        if (is_404()) {
            return __('Not Found', 'sage');
        }
        return get_the_title();
    }

    public static function taxlist($taxid, $posttype, $numposts) {
      if($posttype == 'update') {
        $posts = array($posttype, 'news');
        $base = 'news-updates';
      }
      else {
        $posts = $posttype;
        $base = 'resources';
      }
      $args = array(
        'post_type' => $posts,
        'posts_per_page' => $numposts,
        'orderby' => 'date',
        'order'   => 'DESC',
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'state',
                'field' => 'term_id',
                'terms' => $taxid,
            )
        )
      );
      $query = new WP_Query( $args );
      $taxlisting = array();
      $tax = ucfirst($posttype);
      if($posttype == 'resource') {
        $icon = 'far fa-file-alt';
      }
      elseif($posttype == 'update') {
        $icon = 'fas fa-rss';
      }
      else {

      }
      if ($query->have_posts()) {
        // Start the Loop
        $taxlisting[] = array('tax' => $tax, 'icon' => $icon, 'base' => $base, 'baseid' => $taxid);
        while ( $query->have_posts() ) : $query->the_post();
        // Your loop code
        $posted = get_post_type();
        if($posted == 'news') {
          $link = get_field('publication_link');
          $name = get_field('publication_name');
        }
        else {
          $link = '';
          $name = '';
        }
          $taxlisting[] = array('title' => get_the_title(), 'date' => get_the_date(), 'url' => get_the_permalink(), 'excerpt' => get_the_excerpt(), 'posttype' => $posted, 'link' => $link, 'name' => $name);
        endwhile;  
               
      } // end of check for query having posts
      return $taxlisting;
           
      // use reset postdata to restore orginal query
      wp_reset_postdata();
    }

    public static function campaignlist($taxid, $posttype, $numposts, $tagid) {
      if($posttype == 'update') {
        $posts = array($posttype, 'news');
        $base = 'news-updates';
      }
      else {
        $posts = $posttype;
        $base = 'resources';
      }
      $args = array(
        'post_type' => $posts,
        'posts_per_page' => $numposts,
        'orderby' => 'date',
        'order'   => 'DESC',
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'campaign',
                'field' => 'term_id',
                'terms' => $taxid,
            )
        )
      );
      $query = new WP_Query( $args );
      $camplisting = array();
      $tax = ucfirst($posttype);
      if($posttype == 'resource') {
        $icon = 'far fa-file-alt';
      }
      elseif($posttype == 'update') {
        $icon = 'fas fa-rss';
      }
      else {

      }
      if ($query->have_posts()) {
        // Start the Loop
        $camplisting[] = array('tax' => $tax, 'icon' => $icon, 'campaign' => $taxid, 'base' => $base, 'baseid' => $tagid);
        while ( $query->have_posts() ) : $query->the_post();
        $posted = get_post_type();
        if($posted == 'news') {
          $link = get_field('publication_link');
          $name = get_field('publication_name');
        }
        else {
          $link = '';
          $name = '';
        }
        // Your loop code
          $camplisting[] = array('title' => get_the_title(), 'date' => get_the_date(), 'url' => get_the_permalink(), 'excerpt' => get_the_excerpt(), 'posttype' => $posted, 'link' => $link, 'name' => $name);
        endwhile;  
               
      } // end of check for query having posts
      return $camplisting;
           
      // use reset postdata to restore orginal query
      wp_reset_postdata();
    }

    public static function mapapp() {
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
        if($state->term_id != '11') {
          $statedropdown = $statedropdown.'<option value="/state/'.$state->slug.'">'.$state->name.'</option>';
        }
      }
      $statedropdown = $statedropdown.'</select></div>';
      return $statedropdown;
      wp_reset_postdata();
    }

    public static function stateFilter($statevalue) {
      global $wp;
      if(!empty($statevalue)) {
        $stated = $statevalue;
      }
      else {
        $stated = '';
      }
      $statelist = get_terms( array( 
        'taxonomy' => 'state',
        'orderby' => 'name',
        'order' => 'ASC',
        'hide_empty' => false,
      ));
      $state_select = '<div class="select select-page filter-control">
      <select name="state" class="form-control">
        <option value="">Select a State</option>';
      foreach($statelist as $state) {
        if($state->term_id != 11) {
          if($state->term_id == $stated) {
            $state_select = $state_select.'<option value="'.$state->term_id.'" selected>'.$state->name.'</option>';
          }
          else {
            $state_select = $state_select.'<option value="'.$state->term_id.'">'.$state->name.'</option>';
          }
        }
      }
      $state_select = $state_select.'</select></div>';
      return $state_select;
      wp_reset_postdata();
    }

    public static function campaignFilter($campvalue) {
      global $wp;
      if(!empty($campvalue)) {
        $campaign = $campvalue;
      }
      else {
        $campaign = '';
      }
      $camplist = get_terms( array( 
        'taxonomy' => 'campaign',
        'orderby' => 'name',
        'order' => 'ASC',
        'hide_empty' => false,
      ));
      $campaign_select = '<div class="select select-page filter-control">
      <select name="campaign" class="form-control">
        <option value="">Select a Campaign</option>';
      foreach($camplist as $camp) {
        if($camp->term_id == $campaign) {
          $campaign_select = $campaign_select.'<option value="'.$camp->term_id.'" selected>'.$camp->name.'</option>';
        }
        else {
          $campaign_select = $campaign_select.'<option value="'.$camp->term_id.'">'.$camp->name.'</option>';
        }
      }
      $campaign_select = $campaign_select.'</select></div>';
      return $campaign_select;
      wp_reset_postdata();
    }

    public static function typeFilter($typevalue) {
      global $wp;
      if(!empty($typevalue)) {
        $typ = $typevalue;
      }
      else {
        $typ = '';
      }

      $field = get_field_object('field_5ed674ce955f2');

      $type_select = '<div class="select select-page filter-control">
      <select name="resourcetype" class="form-control">
        <option value="">Select a Resource Type</option>';
      
      foreach ($field['choices'] as $value => $label) {
        if($value == $typ) {
          $type_select = $type_select.'<option value="'.$value.'" selected>'.$label.'</option>';
        }
        else {
          $type_select = $type_select.'<option value="'.$value.'">'.$label.'</option>';
        }
      }
      $type_select = $type_select.'</select></div>';
      return $type_select;
      wp_reset_postdata();
    }

    public static function actionapp($taxid, $posttype) {
      $args = array(
        'post_type' => $posttype,
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order'   => 'DESC',
        'post_status' => 'publish',
        'tax_query' => array(
            array(
                'taxonomy' => 'state',
                'field' => 'term_id',
                'terms' => $taxid,
            )
        )
      );
      $query = new WP_Query( $args );
      $featuredaction = array();
      if ($query->have_posts()) {
        // Start the Loop
        while ( $query->have_posts() ) : $query->the_post();
        // Your loop code
          $featuredaction[] = array('title' => get_the_title(), 'url' => get_the_permalink(), 'excerpt' => get_the_excerpt(), 'image' => get_the_post_thumbnail_url(get_the_ID(),'full'));
        endwhile;  
               
      } // end of check for query having posts
      else {
        $args = array(
        'post_type' => $posttype,
        'posts_per_page' => 1,
        'orderby' => 'date',
        'order'   => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'state',
                'field' => 'term_id',
                'terms' => '11',
            )
          )
        );
        $query = new WP_Query( $args );
        $featuredaction = array();
        while ( $query->have_posts() ) : $query->the_post();
        // Your loop code
          $featuredaction[] = array('title' => get_the_title(), 'url' => get_the_permalink(), 'excerpt' => get_the_excerpt(), 'image' => get_the_post_thumbnail_url(get_the_ID(),'full'));
        endwhile;
      }
      return $featuredaction;
           
      // use reset postdata to restore orginal query
      wp_reset_postdata();
    }
    public static function listing_page($posttype) {
      $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
      if($posttype == 'news') {
        $posttype = array('news', 'update');
        $posts = 'News or Updates';
      }
      else {
        $posts = 'Resources';
      }

      if(!empty($_GET['campaign'])) {
        $camp = array(
                'taxonomy' => 'campaign',
                'field' => 'term_id',
                'terms' => $_GET['campaign'],
            );
      }
      if(!empty($_GET['state'])) {
        $state = array(
                'taxonomy' => 'state',
                'field' => 'term_id',
                'terms' => $_GET['state'],
            );
      }
      if(!empty($_GET['resourcetype'])) {
        $rtype = array('relation' => 'OR');
        $rtype[] = array(
          'key'     => 'resource_type',
          'value'   => $_GET['resourcetype'],
          'compare' => 'LIKE',
        );
      }

      if((!empty($_GET['state'])) && (!empty($_GET['campaign']))) {
        $args = array(
          'post_type' => $posttype,
          'posts_per_page' => 6,
          'orderby' => 'date',
          'order'   => 'DESC',
          'paged' => $paged,
          'tax_query' => array(
              'relation' => 'AND',
              $state, 
              $camp,
            ),
          's' => $_GET['keyword'],
        );
      }
      elseif(!empty($_GET['campaign'])) {
        $args = array(
          'post_type' => $posttype,
          'posts_per_page' => 6,
          'orderby' => 'date',
          'order'   => 'DESC',
          'post_status' => 'publish',
          'paged' => $paged,
          'tax_query' => array($camp),
          's' => $_GET['keyword'],
          'meta_query' => $rtype,
        );
      }
      elseif(!empty($_GET['state'])) {
        $args = array(
          'post_type' => $posttype,
          'posts_per_page' => 6,
          'orderby' => 'date',
          'order'   => 'DESC',
          'post_status' => 'publish',
          'paged' => $paged,
          'tax_query' => array($state),
          's' => $_GET['keyword'],
          'meta_query' => $rtype,
        );
      }
      else {
        $args = array(
          'post_type' => $posttype,
          'posts_per_page' => 6,
          'orderby' => 'date',
          'order'   => 'DESC',
          'post_status' => 'publish',
          'paged' => $paged,
          's' => $_GET['keyword'],
          'meta_query' => $rtype,
        );
      }

        $query = new WP_Query( $args );
        global $wpdb;
        $contentlisting = '';
        if($query->have_posts()) {
          //$qu = $query->request;
          while ( $query->have_posts() ) : $query->the_post();
            $title = get_the_title();
            $link = get_the_permalink();
            $img = get_the_post_thumbnail_url(get_the_ID(),'square_image_500');
            $exc = '';
            if(!empty(get_the_excerpt())) {
              $exc = get_the_excerpt();
            }
            //$contentlisting[] = array('title' => get_the_title(), 'url' => get_the_permalink(), 'image' => get_the_post_thumbnail_url(get_the_ID(),'square_image_500'), 'excerpt' => get_the_excerpt());
            if($posttype == 'resource') {
              $contentlisting = $contentlisting.'
                <div class="col-lg-4">
                  <div class="card">
                    <a href="'.$link.'">
                      <div class="card-background-image">
                        <img src="'.$img.'" class="bg-image">
                      </div>
                      <div class="color-overlay"></div>
                      <div class="text-overlay">
                        <div class="text-headline"><h2 class="mt-0">'.$title.'</h2></div>
                        <div class="text-exc">
                          '.$exc.'
                        </div>
                      </div>
                    </a>
                  </div>
                </div>';
            }
            else {
              if(get_post_type() == 'update') {
                $image = '<div class="col-lg-4"><img src="'.$img.'"></div>';
              }
              else {
                $image = '';
              }
              $contentlisting = $contentlisting.'
                <div class="row">
                  '.$image.'
                  <div class="col">
                    <h3><a href="'.$link.'">'.$title.'</a></h3>
                    <p>'.$exc.'</p>
                  </div>
                </div>
              ';
            }
          endwhile;
          if($posttype == 'resource') {
            $contentlist = '<div class="row">' 
            . $contentlisting 
            . '</div><div class="row"><div class="col-lg-12">'.pagination( $paged, $query->max_num_pages).'</div></div><div class="row"></div>';
          }
          else {
            $contentlist = $contentlisting.'<div class="row"><div class="col-lg-12">'.pagination( $paged, $query->max_num_pages).'</div></div>';
          }
        }
        else {
          $contentlist = '<div class="row"><div class="col-lg-12"><h3>No '.$posts.' Found</h3><p>Your search did not yield any posts. Please adjust the filters and try again.</p></div></div>';
        }
        return $contentlist;

      wp_reset_postdata();
    }

}
