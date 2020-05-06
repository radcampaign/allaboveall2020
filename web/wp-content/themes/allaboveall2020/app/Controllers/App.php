<?php

namespace App\Controllers;

use Sober\Controller\Controller;

class App extends Controller
{
    public function siteName()
    {
        return get_bloginfo('name');
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
}
