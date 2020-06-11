<footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-2">
        <a class="navbar-brand" href="{{ home_url('/') }}">
          <img src="@asset('images/aaa-logo-white.png')">
        </a>
      </div>
      <div class="col-lg-9">
        <div class="footer-nav-social">
          <ul>
            <?php
              $date = date('Y');
              $menu_name = 'footer_social';
              $locations = get_nav_menu_locations();
              $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
              $footersocial = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
              foreach($footersocial as $s) {
                if($s->title == 'Facebook') {
                  echo '<li><a href="'.$s->url.'" class="footer-social"><i class="fab fa-facebook-f"></i></a></li>';
                }
                if($s->title == 'Twitter') {
                  echo '<li><a href="'.$s->url.'" class="footer-social"><i class="fab fa-twitter"></i></a></li>';
                }
                if($s->title == 'Instagram') {
                  echo '<li><a href="'.$s->url.'" class="footer-social"><i class="fab fa-instagram"></i></a></li>';
                }
              }
            ?>
        </div>
        <div class="footer-nav">
          @if (has_nav_menu('footer_navigation'))
            {!! wp_nav_menu(['theme_location' => 'footer_navigation', 'menu_class' => 'nav-footer']) !!}
          @endif
        </div>
        <div class="footer-text">
          <p class="text-font-black">PH (374) 719-3255</p>
          <p><i class="far fa-copyright"></i> {{ $date }} All* Above All. All Rights Reserved.</p>
        </div>
      </div>
    </div>
  </div>
</footer>
