<header class="main-header {{ !is_front_page() ? 'header-shadow' : '' }}">
  <div class="container">

    {{-- # Brand --}}
    <div class="brand">
      <a href="{{ home_url('/') }}">
        <img src="{!! get_template_directory_uri() !!}/assets/images/brand.png" alt="dailycomfort">
      </a>
    </div>

    {{-- Main Menu --}}
    <div class="nav-primary">
      <nav>
        @if (has_nav_menu('header_menu'))
          {!! wp_nav_menu([
            'theme_location' => 'header_menu',
            'menu_class' => '',
            'container' => '',
            ])
          !!}
        @endif
      </nav>
    </div>

    {{-- # Second Menu --}}
    <div class="nav-secondary">

      {{-- # Search--}}
      <div class="nav-search">
        <a href="#">
          <i class="la la-search"></i>
        </a>
      </div>

      {{-- # Cart --}}
      <div class="nav-cart">
        <a href="#">
          <i class="la la-shopping-cart"></i>
        </a>
      </div>

      {{-- # User --}}
      <div class="nav-user">
        <a href="#">
          <i class="la la-user"></i>
        </a>
      </div>

    </div>

  </div>
</header>
