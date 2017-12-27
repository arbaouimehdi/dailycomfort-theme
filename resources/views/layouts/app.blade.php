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
    <!-- #              Main            # -->
    <!-- #                              # -->
    <!-- #                              # -->
    <!-- # ############################ # --}}
    <div class="wrap {{ !is_front_page() ? 'container' : '' }}" role="document">
      <div class="content">
        <main class="main">
          @yield('content')
        </main>
        @if (App\display_sidebar())
          {{-- # ############################ # -->
          <!-- #                              # -->
          <!-- #           Sidebar            # -->
          <!-- #                              # -->
          <!-- # ############################ # --}}
          <aside class="sidebar">
            @include('layouts.sidebar')
          </aside>
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
