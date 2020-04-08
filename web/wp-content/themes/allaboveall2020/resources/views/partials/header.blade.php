<header class="banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-2">
        <a class="navbar-brand" href="{{ home_url('/') }}">
          <img src="@asset('images/aaa-logo.png')">
        </a>
      </div>
      <div class="col-lg-10">
        <nav class="navbar navbar-expand-lg">
          <div class="navbar-collapse collapse" id="headerCollapse">
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
</header>
