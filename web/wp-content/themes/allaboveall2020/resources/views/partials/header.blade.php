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
            <div class="navbar-collapse collapse pl-0" id="headerCollapse">
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headerCollapse" aria-controls="headerCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="far fa-bars"></i>
              </button>
              @if (has_nav_menu('primary_navigation'))
                {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
              @endif
            </div>
          </nav>
            @if (has_nav_menu('header_social'))
              {!! wp_nav_menu(['theme_location' => 'header_social', 'menu_class' => 'nav-social']) !!}
            @endif
        </div>
      </div>
    </div>
  </div>
</header>
