<?php

namespace App;

use Sober\Controller\Controller;

class App extends Controller
{
  public function siteName(){
    return get_bloginfo('name');
  }

  public static function title(){
    if (is_home()) {
      if ($home = get_option('page_for_posts', true)) {
        return get_the_title($home);
      }
      return __('Latest Posts', 'sage');
    }
    if (is_archive()) {
      return get_the_archive_title();
    }
    if (is_search()) {
      return sprintf(__('Search Results for %s', 'sage'), get_search_query());
    }
    if (is_404()) {
      return __('Not Found', 'sage');
    }
    return get_the_title();
  }

  /**
   * @param $page_type
   * @return false|string
   */
  public static function wooCommerceUrl($page_type){
    global $woocommerce;

    $account_page_id = get_option('woocommerce_myaccount_page_id');
    $page_url = '';

    /**
     * Shop URL
     */
    if ($page_type == 'shop') {
      $page_url = get_permalink( woocommerce_get_page_id( 'shop' ) );
    }

    /**
     * My Account URL
     */
    if ($page_type == 'myAccount') {
      if ($account_page_id) {
        $page_url = get_permalink($account_page_id);
      }
    }

    /**
     * My Account URL
     */
    if ($page_type == 'logout') {
      if ($account_page_id) {
        $page_url = wp_logout_url( get_permalink($account_page_id));
        if (get_option( 'woocommerce_force_ssl_checkout' ) == 'yes' ){
          $page_url = str_replace( 'http:', 'https:', $page_url);
        }
      }
    }

    /**
     * Cart URL
     */
    if ($page_type == 'cart') {
      $page_url = $woocommerce->cart->get_cart_url();
    }

    /**
     * Checkout URL
     */
    if ($page_type == 'checkout') {
      $page_url = $woocommerce->cart->get_checkout_url();
    }

    /**
     * Payment Page URL
     */
    if ($page_type == 'payment') {
      $page_url = get_permalink(woocommerce_get_page_id('pay'));
      if (get_option('woocommerce_force_ssl_checkout' ) == 'yes') {
        $page_url = str_replace( 'http:', 'https:', $page_url );
      }
    }

    return $page_url;
  }
}
