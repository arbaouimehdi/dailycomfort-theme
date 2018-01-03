@extends('layouts.app')

@section('content')


  <div class="page-container">
    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, no results were found.', 'dailycomfort') }}
      </div>
      {!! get_search_form(false) !!}
    @endif

    @while (have_posts()) @php(the_post())
      @include('blog/content-'.get_post_type())
    @endwhile
  </div>

@endsection
