@extends('layouts.app')

@section('content')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{  __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif

  <div class="page-container">
    @while(have_posts()) @php(the_post())
      @include('blog/content-search')
    @endwhile
  </div>

  {!! get_the_posts_navigation() !!}
@endsection
