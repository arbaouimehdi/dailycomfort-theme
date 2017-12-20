{{--
  Template Name: Home Page
--}}

@extends('layouts.app')

@section('content')

  {{-- # ############################ # -->
  <!-- #                              # -->
  <!-- #          Main Section        # -->
  <!-- #                              # -->
  <!-- # ############################ # --}}
  <div class="main-section">
    <div class="container">

      <div class="big-title">
        <h1>Quality Doesn’t Have To Be <b>Expensive</b></h1>
        <p>
          Jakiro grew out of a love affair with the rising independent fashion, open attitude,<br>
          unexpected pairings, and appreciation for all things<br>
          ecclectic and unique.
        </p>
        <a href="{!! Shop::getUrl('shop') !!}" class="btn btn-light">
          Shop Now
          <i class="la la-shopping-cart"></i>
        </a>
      </div>

    </div>
  </div>

  {{-- # ############################ # -->
  <!-- #                              # -->
  <!-- #        Gallery Section       # -->
  <!-- #                              # -->
  <!-- # ############################ # --}}
  <div class="gallery-section">
    <div id="categoriesGallery" class="carousel slide" data-ride="carousel">

      {{-- # Content --}}
      <div class="carousel-inner">

        {{-- # Navigation --}}
        <ol class="carousel-indicators">
          @foreach(Shop::categoriesList() as $key => $category)
            <li data-target="#categoriesGallery" data-slide-to="{{ $key }}" class="{{ $category->name == 'Beds' ? 'active' : '' }}"></li>
          @endforeach
        </ol>

        {{-- # Items --}}
        @foreach(Shop::categoriesList() as $category)
          <div class="carousel-item {{ $category->name == 'Beds' ? 'active' : '' }}">
            <div class="row">

              {{-- # Content --}}
              <div class="col-md-7 carousel-content">
                <h2>
                  <b>{{ $category->name }}</b>
                  Buy {{ $category->name }} Online
                </h2>
                <p>
                  {{ $category->category_description }}
                </p>
                <a href="{{ get_term_link($category->term_id) }}" class="btn btn-light">Show More</a>
              </div>

              {{-- # Image --}}
              <div class="col-md-5 carousel-image">
                <span>{{ $category->name }}</span>
                <img src="{{ Shop::categoryImage($category->term_id) }}" alt="">
              </div>

            </div>
          </div>
        @endforeach

      </div>

    </div>
  </div>

@endsection
