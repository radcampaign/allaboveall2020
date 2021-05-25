<header class="banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 desktop-logo">
        <a class="navbar-brand" href="{{ home_url('/') }}">
          <img src="@asset('images/all-logo-h.png')">
        </a>
      </div>
      <div class="col-lg-8">
        <div class="header-top">
          <h2 class="head-title pl-2 mb-0">Be Bold. Join Us.</h2>
            <link rel='preload' href='https://d3rse9xjbp8270.cloudfront.net/at.js' as='script' crossorigin='anonymous'>
             <link rel='preload' href='https://d3rse9xjbp8270.cloudfront.net/at.min.css' as='style'>
             <script type='text/javascript' src='https://d3rse9xjbp8270.cloudfront.net/at.js' crossorigin='anonymous'></script>
             <div class="ngp-form"
                 data-form-url="https://secure.everyaction.com/v1/Forms/VUnYfh_G60a98wum7ljGMg2"
                 data-fastaction-endpoint="https://fastaction.ngpvan.com"
                 data-inline-errors="true"
                 data-fastaction-nologin="true"
                 data-databag-endpoint="https://profile.ngpvan.com"
                 data-databag="everybody"
                      data-mobile-autofocus="false">
            </div>
        </div>
        <div class="mobile-logo">
          <a class="navbar-brand" href="{{ home_url('/') }}">
            <img src="@asset('images/all-logo-h.png')">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headerCollapse" aria-controls="headerCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
              </button>
        </div>

        <div class="header-bottom">
          <nav class="navbar navbar-expand-lg pl-0">
            <div class="navbar-collapse collapse pl-0" id="headerCollapse">
              @include('components.nav', ['navitems' => App::nav('primary_navigation')])
              <ul class="header-social social-mobile">
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
                    if($s->title == 'Instagram') {
                      echo '<li><a href="'.$s->url.'" class="secondary-item"><i class="fab fa-instagram"></i></a></li>';
                    }
                  }
                ?>
                <li><a class="secondary-item" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-search"></i><span class="sr-only">Expand search form</span></a></li>
              </ul>
            </div>
          </nav>
          <ul class="header-social social-desktop">
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
                if($s->title == 'Instagram') {
                  echo '<li><a href="'.$s->url.'" class="secondary-item"><i class="fab fa-instagram"></i></a></li>';
                }
              }
            ?>
            <li><a class="secondary-item" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-search"></i><span class="sr-only">Expand search form</span></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</header>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <i class="far fa-times-circle"></i>
        </button>
      </div>
      <div class="modal-body">
        @php(get_search_form())
      </div>
    </div>
  </div>
</div>
