<?php wc_print_notices(); ?>


<div class="row justify-content-md-center">
  <div class="col col-lg-6">
    <form method="post">

      {{-- # Password --}}
      <div class="form-group">
        <label for="password">Username or Email <span class="required">*</span></label>
        <input type="text"
               class="form-control"
               name="user_login"
               id="user_login"
               placeholder="Enter your Username or Email">
      </div>

      {{-- # --}}
      <?php do_action( 'woocommerce_lostpassword_form' ); ?>
      <div class="form-group form-actions">
        <input type="hidden" name="wc_reset_password" value="true" />
        <input type="submit" class="btn btn-dark" value="<?php esc_attr_e( 'Reset password', 'woocommerce' ); ?>" />
      </div>
      <?php wp_nonce_field( 'lost_password' ); ?>

    </form>
  </div>
</div>

