<?php

namespace Woocommerce;

use Sober\Controller\Controller;

class Shop extends Controller {

  /**
   * Get URL
   *
   * @param $page_type
   * @return false|string
   */
  public function getUrl($page_type){
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

  /**
   * Get the list of Categories
   *
   * @return array
   */
  public function categoriesList(){
    $get_featured_cats = array(
      'taxonomy'     => 'product_cat',
      'orderby'      => 'name',
      'hide_empty'   => '0',
    );
    $all_categories = get_categories($get_featured_cats);
    return $all_categories;
  }

  /**
   * Get Category Image URL
   *
   * @param $cat_id
   * @return string
   */
  public function categoryImage($cat_id){
    $thumbnail_id = get_woocommerce_term_meta( $cat_id, 'thumbnail_id', true );
    $image_url    = wp_get_attachment_url($thumbnail_id);
    return $image_url;
  }

  /**
   * Select Box
   */
  public function productsSelectBox() {
    $per_page = filter_input(INPUT_GET, 'perpage', FILTER_SANITIZE_NUMBER_INT);
    echo '<div class="woocommerce-perpage styled-select">';
    echo '<select onchange="if (this.value) window.location.href=this.value">';
    $orderby_options = array(
      '12' => '12',
      '24' => '24',
      '36' => '36'
    );
    foreach( $orderby_options as $value => $label ) {
      echo "<option ".selected( $per_page, $value )." value='?perpage=$value'>$label</option>";
    }
    echo '</select>';
    echo '<i class="la la-angle-down"></i>';
    echo '</div></div></div>';
  }

  /**
   * Get Products
   *
   * @param $query
   */
  public function getProductsQuery($query) {
    $per_page = filter_input(INPUT_GET, 'perpage', FILTER_SANITIZE_NUMBER_INT);
    if( $query->is_main_query() && !is_admin() && is_post_type_archive( 'product' ) ) {
      $query->set( 'posts_per_page', $per_page );
    }
  }

  /**
   * Views Modes
   */
  public function viewModes(){
    echo '<div class="col-md-9 toolbox-modes">
    <div class="woocommerce-view-modes"> 
      <a class="grid-mode active" title="Grid" href="#"><i class="la la-th-large"></i></a> 
      <a class="list-mode" title="List" href="#"><i class="la la-bars"></i></a>
    </div>';
  }

  /**
   * Check if the item exist in the cart
   *
   * @param $itemID
   */
  public function itemInCart($item_id) {
    global $woocommerce;

    foreach($woocommerce->cart->get_cart() as $key => $val ) {
      $_product = $val['data'];

      if($item_id == $_product->id ) {
        return true;
      }
    }

    return false;
  }

  /**
   * Remove Item From Cart
   *
   * @return bool
   */
  public function removeItemFromCart() {
    ob_clean();
    $cart = WC()->instance()->cart;
    $id = $_POST['product_id'];
    $cart_id = $cart->generate_cart_id($id);
    $cart_item_id = $cart->find_product_in_cart($cart_id);

    if($cart_item_id){
      $cart->set_quantity($cart_item_id, 0);
      // echo the Cart HTML list
    }
    wp_die();
  }

  /**
   * Add item to cart
   *
   */
  public function addItemToCart(){
    ob_clean();
    $product_id       = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];
    WC()->cart->add_to_cart($product_id, $product_quantity);

    // echo the Cart HTML list

    wp_die();
  }

}
