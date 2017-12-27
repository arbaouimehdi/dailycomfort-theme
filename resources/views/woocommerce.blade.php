@extends('layouts.app')

@section('content')
  @include('layouts/page-breadcrumbs')
  @php(woocommerce_content())
@endsection
