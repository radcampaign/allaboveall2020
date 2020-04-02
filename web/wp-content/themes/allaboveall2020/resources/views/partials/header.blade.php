<header class="banner">
  <div class="container">
    <div class="row">
      <div class="col-lg-2">
        <a class="navbar-brand" href="{{ home_url('/') }}">
          <img src="@asset('images/aaa-logo.png')">
        </a>
      </div>
      <div class="col-lg-10">
        <nav class="nav-primary">
          @if (has_nav_menu('primary_navigation'))
            {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
          @endif
        </nav>
          @if (has_nav_menu('header_social'))
            {!! wp_nav_menu(['theme_location' => 'header_social', 'menu_class' => 'nav-social']) !!}
          @endif
      </div>
    </div>
  </div>
</header>
