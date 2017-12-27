<div class="page-breadcrumbs">
  <div class="container">
    <div class="header-title">
      <h1>{!! App::title() !!}</h1>
      @if(!is_woocommerce())
        {!! App::breadcrumbs() !!}
      @endif
    </div>
  </div>
</div>
