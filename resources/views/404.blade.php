@extends('layouts.app')

@section('content')
  @include('layouts/page-breadcrumbs')

  @if (!have_posts())
      {{ __('Sorry, but the page you were trying to view does not exist.', 'dailycomfort') }}
  @endif
@endsection
