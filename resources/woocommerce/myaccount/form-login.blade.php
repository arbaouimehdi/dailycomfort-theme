<?php wc_print_notices(); ?>

{{-- # My Account --}}
<div class="row justify-content-md-center">

  {{-- # Login --}}
  <div class="col col-lg-6">

    <h2>Login</h2>

    <form method="post">

      <?php do_action('woocommerce_login_form_start'); ?>

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

      <?php do_action('woocommerce_login_form'); ?>

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

      <?php do_action('woocommerce_login_form_end'); ?>

    </form>
  </div>

  {{-- # Register --}}
  @if (get_option( 'woocommerce_enable_myaccount_registration') === 'yes')
    <div class="col col-lg-6">

      <h2>Register</h2>

      <form method="post">

        <?php do_action('woocommerce_register_form_start'); ?>

        {{-- # Email --}}
        <div class="form-group">
          <label for="reg_email">Email address <span class="required">*</span></label>
          <input type="email"
                 name="email"
                 class="form-control"
                 id="reg_email"
                 value="<?php echo (!empty($_POST['email'])) ? esc_attr($_POST['email']) : ''; ?>"/>
        </div>

        {{-- # Password --}}
        <div class="form-group">
          <label for="reg_password">Password <span class="required">*</span></label>
          <input type="password"
                 name="password"
                 class="form-control"
                 id="reg_password"/>
        </div>

        {{-- # Register --}}
        <?php do_action('woocommerce_register_form'); ?>


        <div class="form-group form-actions">
          <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
          <input type="submit" class="btn btn-dark" name="register"
                 value="<?php esc_attr_e('Register', 'woocommerce'); ?>"/>
        </div>

        <?php do_action('woocommerce_register_form_end'); ?>

      </form>
    </div>
  @endif

</div>

<?php do_action('woocommerce_after_customer_login_form'); ?>