@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    <div class="page-container">
      @include('blog/content-single-'.get_post_type())
    </div>
  @endwhile
@endsection
