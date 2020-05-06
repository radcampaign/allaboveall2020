<header class="banner">
  <div class="header-background-bar"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-2">
        <a class="navbar-brand" href="{{ home_url('/') }}">
          <img src="@asset('images/aaa-logo.png')">
        </a>
      </div>
      <div class="col-lg-9 offset-lg-1">
        <div class="header-top p-3">
          <h2 class="head-title pl-2 mb-0">Be Bold. Join Us.</h2>
        </div>
        <div class="header-bottom">
          <nav class="navbar navbar-expand-lg pl-0">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headerCollapse" aria-controls="headerCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
              </button>
            <div class="navbar-collapse collapse pl-0" id="headerCollapse">
              @include('components.nav', ['navitems' => App::nav('primary_navigation')])
            </div>
          </nav>
          <ul class="header-social">
            <?php
              $menu_name = 'header_social';
              $locations = get_nav_menu_locations();
              $menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
              $secondarymenu = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );
              foreach($secondarymenu as $s) {
                if($s->title == 'Facebook') {
                  echo '<li><a href="'.$s->url.'" class="secondary-item"><i class="fab fa-facebook-f"></i></a></li>';
                }
                if($s->title == 'Twitter') {
                  echo '<li><a href="'.$s->url.'" class="secondary-item"><i class="fab fa-twitter"></i></a></li>';
                }
              }
            ?>
            <li><a href="/" class="secondary-item"><i class="fas fa-search"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>
