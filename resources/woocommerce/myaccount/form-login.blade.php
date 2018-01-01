{{ wc_print_notices() }}

{{ do_action('woocommerce_before_customer_login_form') }}

<div class="row justify-content-md-center">
  <div class="col col-lg-6">
    <form method="post">

      {{ do_action('woocommerce_login_form_start') }}

      {{-- Username or Email --}}
      <div class="form-group">
        <label for="username">Username or Email address</label>
        <input type="text"
               class="form-control"
               name="username"
               id="username"
               value="{{ !empty($_POST['username']) ? esc_attr($_POST['username']) : '' }}"
               placeholder="Enter your username or email"/>
      </div>

      {{-- # Password --}}
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password"
               class="form-control"
               name="password"
               id="password"
               placeholder="Enter your password">
      </div>


      {{ do_action('woocommerce_login_form') }}

      {{-- # Login & Remember me --}}
      <div class="form-group form-actions">
        <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce' ); ?>
        <button type="submit" class="btn btn-dark" name="login">
          Login
          <i class="arrow"></i>
        </button>

       <span>
          Remember me <input name="rememberme" type="checkbox" id="rememberme" value="forever" />
       </span>

      </div>

      {{-- # Lost Password --}}
      <a href="{{ esc_url(wp_lostpassword_url()) }}">Lost your password?</a>

      {{ do_action('woocommerce_login_form_end') }}

    </form>
  </div>
</div>



