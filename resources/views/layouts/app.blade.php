<!doctype html>
<html @php(language_attributes())>
  @include('layouts/head')
  <body @php(body_class())>

    {{-- # ############################ # -->
    <!-- #                              # -->
    <!-- #                              # -->
    <!-- #            Header            # -->
    <!-- #                              # -->
    <!-- #                              # -->
    <!-- # ############################ # --}}
    @include('layouts.header')

    {{-- # ############################ # -->
    <!-- #                              # -->
    <!-- #                              # -->
    <!-- #              Wrap            # -->
    <!-- #                              # -->
    <!-- #                              # -->
    <!-- # ############################ # --}}
    <div class="wrap {{ !is_front_page() ? 'container' : '' }}" role="document">

      {{-- # ############################ # -->
      <!-- #                              # -->
      <!-- #          Breadcrumbs         # -->
      <!-- #                              # -->
      <!-- # ############################ # --}}
      @if(!is_front_page())
        @include('layouts/page-breadcrumbs')
      @endif

      <div class="content">

        {{-- # ############################ # -->
        <!-- #                              # -->
        <!-- #           Sidebar            # -->
        <!-- #                              # -->
        <!-- # ############################ # --}}
        @if (App\display_sidebar())

          <div class="row">
            <main class="main col-sm-9 col-xs-12">
              @yield('content')
            </main>

            <aside class="sidebar col-sm-3 col-xs-12">
              @include('layouts.sidebar')
            </aside>
          </div>

          {{-- # ############################ # -->
          <!-- #                              # -->
          <!-- #          No Sidebar          # -->
          <!-- #                              # -->
          <!-- # ############################ # --}}
          @else
            <main class="main">
              @yield('content')
            </main>

        @endif

      </div>
    </div>

    {{-- # ############################ # -->
    <!-- #                              # -->
    <!-- #                              # -->
    <!-- #            Footer            # -->
    <!-- #                              # -->
    <!-- #                              # -->
    <!-- # ############################ # --}}
    @php(do_action('get_footer'))
    @include('layouts/footer')
    @php(wp_footer())

  </body>
</html>
