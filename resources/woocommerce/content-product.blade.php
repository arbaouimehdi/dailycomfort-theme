<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

global $product;

?>

{{-- Ensure visibility --}}
@if(empty($product) || ! $product->is_visible())
  @php
    return
  @endphp
@endif

<div class="col col-md-4">
  <div <?php post_class(); ?>>

    {{-- # ############################ # -->
    <!-- #                              # -->
    <!-- #            Image             # -->
    <!-- #                              # -->
    <!-- # ############################ # --}}
    <div class="product-image">

      {{-- # On Sale --}}
      @if($product->is_on_sale())
        <div class="sale-tag">
          {!! apply_filters(
            'woocommerce_sale_flash',
            '<span>' . esc_html__( 'Sale!', 'woocommerce' ) . '</span>', $post, $product)
          !!}
        </div>
      @endif

      {{-- # Product Infos --}}
      <a href="{{ get_permalink() }}">
        {!! wp_get_attachment_image(get_post_thumbnail_id(), 'full') !!}
      </a>

    </div>

    {{-- # ############################ # -->
    <!-- #                              # -->
    <!-- #        Infos & Actions       # -->
    <!-- #                              # -->
    <!-- # ############################ # --}}
    <figcaption>

      {{-- # Product Name --}}
      <div class="product-title">
        <h3>
          <a href="{{ get_permalink() }}">{{ $product->name }}</a>
        </h3>
      </div>

      {{-- # Price --}}
      <div class="product-price">
        @if($price_html = $product->get_price_html())
          {!! $price_html !!}
        @endif
      </div>

      {{-- # Description --}}
      <div class="product-description">
        {{ $product->short_description }}
      </div>

      {{-- # Add to Cart Button --}}
      <div class="product-actions">
        <a href="#"
           class="btn add-to-cart"
           data-product-quantity="{{ esc_attr(isset($quantity) ? $quantity : 1) }}" data-product-id="{{ esc_attr($product->get_id()) }}">Add to Cart</a>
      </div>

    </figcaption>

  </div>
</div>
