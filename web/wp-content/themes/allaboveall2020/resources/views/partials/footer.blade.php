<footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-2">
        <a class="navbar-brand" href="{{ home_url('/') }}">
          <img src="@asset('images/aaa-logo-white.png')">
        </a>
      </div>
      <div class="col-lg-10">
        <div class="footer-nav-social">
          @if (has_nav_menu('header_social'))
            {!! wp_nav_menu(['theme_location' => 'header_social', 'menu_class' => 'nav-social']) !!}
          @endif
        </div>
        <div class="footer-nav">
          @if (has_nav_menu('header_social'))
            {!! wp_nav_menu(['theme_location' => 'header_social', 'menu_class' => 'nav-social']) !!}
          @endif
        </div>
        <div class="footer-text">
          <p>PH (374) 719-3255</p>
        </div>
      </div>
    </div>
  </div>
</footer>
