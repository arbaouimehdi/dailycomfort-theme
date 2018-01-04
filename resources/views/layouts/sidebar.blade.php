@if(is_woocommerce())
  @php(dynamic_sidebar('sidebar-shop'))

  @else
    @php(dynamic_sidebar('sidebar-primary'))

@endif