{{--
  Template Name: Custom Template
--}}

@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('layouts/page-breadcrumbs')
    <div class="page-container">
      @include('blog/content-page')
    </div>
  @endwhile
@endsection
