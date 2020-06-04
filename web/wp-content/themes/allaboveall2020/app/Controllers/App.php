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
      $args = array(
        'post_type' => $posttype,
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
        $taxlisting[] = array('tax' => $tax, 'icon' => $icon);
        while ( $query->have_posts() ) : $query->the_post();
        // Your loop code
          $taxlisting[] = array('title' => get_the_title(), 'date' => get_the_date(), 'url' => get_the_permalink(), 'excerpt' => get_the_excerpt(), 'posttype' => $posttype);
        endwhile;  
               
      } // end of check for query having posts
      return $taxlisting;
           
      // use reset postdata to restore orginal query
      wp_reset_postdata();
    }

    public static function campaignlist($taxid, $posttype, $numposts) {
      $args = array(
        'post_type' => $posttype,
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
        $camplisting[] = array('tax' => $tax, 'icon' => $icon);
        while ( $query->have_posts() ) : $query->the_post();
        // Your loop code
          $camplisting[] = array('title' => get_the_title(), 'date' => get_the_date(), 'url' => get_the_permalink(), 'excerpt' => get_the_excerpt(), 'posttype' => $posttype);
        endwhile;  
               
      } // end of check for query having posts
      return $camplisting;
           
      // use reset postdata to restore orginal query
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
}
