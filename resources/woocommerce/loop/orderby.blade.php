<?php

if ( ! defined( 'ABSPATH' ) ) {
  exit; // Exit if accessed directly
}

?>
<div class="woocommerce-ordering">
  <form method="get">
    <div class="styled-select">
      <select name="orderby" class="orderby">
        <?php foreach($catalog_orderby_options as $id => $name) : ?>
        <option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>>
          <?php echo esc_html( $name ); ?>
        </option>
        <?php endforeach; ?>
      </select>
      <i class="la la-angle-down"></i>
      {{ wc_query_string_form_fields(null, array('orderby', 'submit')) }}
    </div>
  </form>
</div>