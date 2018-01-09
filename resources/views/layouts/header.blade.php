<?php
  global $woocommerce;
  $items_count = $woocommerce->cart->cart_contents_count;
  $items = WC()->cart->get_cart();
?>
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

        {{-- # --}}
        <a href="#">
          <i class="la la-shopping-cart"></i>
          @if($items_count > 0)
            <span>{{ $woocommerce->cart->cart_contents_count }}</span>
          @endif
        </a>

        {{-- # Shoping Cart List --}}
        <div class="menu-sc-list">

          {{-- # If items exist --}}
          @if($items)

            {{-- # List --}}
            <ul>
              @foreach($items as $item => $values)
                @php($_product = $values['data']->post)
                @php($variation = $values['variation_id'])
                <li>
                  <div class="menu-sc-img">
                    <a href="#">
                      {!! get_the_post_thumbnail( $values['product_id'], 'thumbnail' ) !!}
                    </a>
                  </div>
                  <div class="menu-sc-items-wrapper">
                    <h3>
                      <a href="#">{{ $_product->post_title }}</a>
                    </h3>
                    <span>
                    <span class="quantity">1</span>
                    <span class="amount">x</span>
                    <span class="price">
                      <span>$</span>130.00
                    </span>
                  </span>
                    <a href="#" class="remove-item" title="">
                      <i class="la la-close"></i>
                    </a>
                  </div>
                </li>
              @endforeach
            </ul>

            {{-- # Actions --}}
            <div class="menu-sc-actions" style="display: none">
              <span>Subtotal :$130.00</span>
              <a href="#" class="btn">View cart</a>
              <a href="#" class="btn">Checkout</a>
            </div>

            {{-- # No Item --}}
            @else
              <p>No products in the cart. No products in the cart.</p>

          @endif

        </div>

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
