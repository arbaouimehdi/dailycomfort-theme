<header class="main-header">
  <div class="container">

    {{-- # Brand --}}
    <div class="brand">
      <a href="{{ home_url('/') }}">
        <img src="<?php echo get_template_directory_uri() ?>/assets/images/brand.png" alt="dailycomfort">
      </a>
    </div>

    {{-- Main Menu --}}
    <div class="nav-primary">
      <nav>
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
        @endif
        <ul>
          {{-- # Home --}}
          <li class="active">
            <a href="#">Home</a>
            {{-- Sub Menu --}}
            <ul class="sub-menu" style="display: none">
              <li class="active">
                <a href="#">Home One</a>
              </li>
              <li class="active">
                <a href="#">Home Two</a>
              </li>
            </ul>
          </li>
          {{-- # Shop--}}
          <li>
            <a href="#">Shop</a>
          </li>
          {{-- Blog --}}
          <li>
            <a href="#">Blog</a>
          </li>
          {{-- # Pages --}}
          <li>
            <a href="#">Pages</a>
          </li>
          {{-- # Contact --}}
          <li>
            <a href="#">Contact</a>
          </li>
        </ul>

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
