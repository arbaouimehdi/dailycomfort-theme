<?php wc_print_notices(); ?>


<div class="row justify-content-md-center">
  <div class="col col-lg-6">

    <form method="post">

      {{-- Username or Email --}}
      <div class="form-group">
        <label for="username">Username or Email address <span class="required">*</span></label>
        <input type="text"
               class="form-control"
               name="username"
               id="username"
               value="{{ !empty($_POST['username']) ? esc_attr($_POST['username']) : '' }}"
               placeholder="Enter your username or email"/>
      </div>

      {{-- # Password --}}
      <div class="form-group">
        <label for="password">Password <span class="required">*</span></label>
        <input type="password"
               class="form-control"
               name="password"
               id="password"
               placeholder="Enter your password">
      </div>


      {{-- # Login & Remember me --}}
      <div class="form-group form-actions">
        <?php wp_nonce_field('woocommerce-login'); ?>
        <input type="submit" class="btn btn-dark" name="login"
               value="<?php esc_attr_e('Login', 'woocommerce'); ?>"/>
        <input type="hidden" name="redirect" value="<?php echo esc_url($redirect_url); ?>"/>
        <span>
          <input name="rememberme" type="checkbox" id="rememberme" value="forever"/>
          Remember me
        </span>
      </div>

      {{-- # Lost Password --}}
      <a href="{{ esc_url(wp_lostpassword_url()) }}">Lost your password?</a>

    </form>
  </div>
</div>



