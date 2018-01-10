<?php
  global $woocommerce;
  $items_count = $woocommerce->cart->cart_contents_count;
  $items = WC()->cart->get_cart();
  $currency = get_woocommerce_currency_symbol();
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
        <a href="{{ wc_get_cart_url() }}">
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
                @php
                  $_product   = $values['data']->post;
                  $variation  = $values['variation_id'];
                  $product_id = $values['product_id'];
                  $price      = get_post_meta( $values['product_id'], '_regular_price', true);
                  $quantity   = $values['quantity'];
                @endphp
                <li>
                  <div class="menu-sc-img">
                    <a href="{{ get_permalink($product_id) }}">
                      {!! get_the_post_thumbnail($product_id, 'thumbnail' ) !!}
                    </a>
                  </div>
                  <div class="menu-sc-items-wrapper">
                    <h3>
                      <a href="{{ get_permalink($product_id) }}">{{ $_product->post_title }}</a>
                    </h3>
                    <span>
                    <span class="quantity">{{ $quantity }}</span>
                    <span class="amount">x</span>
                    <span class="price">
                      <span>{{ $currency }}</span>{{ $price }}
                    </span>
                  </span>
                    <a href="#" class="remove-item" title="" data-product-id="{{ $product_id }}">
                      <i class="la la-close"></i>
                    </a>
                  </div>
                </li>
              @endforeach
            </ul>

            {{-- # Actions --}}
            <div class="menu-sc-actions">
              <span class="menu-sc-subtotal">
                Subtotal :
                {!! $woocommerce->cart->get_cart_subtotal() !!}
              </span>
              <span class="menu-sc-buttons">
                <a href="{{ wc_get_cart_url() }}" class="btn btn-dark">
                  <i class="la la-shopping-cart"></i>
                  View cart
                </a>
                <a href="{{ wc_get_checkout_url() }}" class="btn">Checkout</a>
              </span>
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
