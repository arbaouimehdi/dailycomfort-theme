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
                <a href="{{ get_term_link($category->term_id) }}" class="btn btn-light">
                  Discover More
                  <i class="arrow"></i>
                </a>
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

  {{-- # ############################ # -->
  <!-- #                              # -->
  <!-- #           Our Shop           # -->
  <!-- #                              # -->
  <!-- # ############################ # --}}
  <div class="categories-section section">
    <div class="container">
      <div class="row">

        {{-- # Title --}}
        <div class="section-title">
          <h2>Our Shop</h2>
          <h3>From stylish sofas available in a variety of colours</h3>
        </div>

        {{-- # List--}}
        <div class="cat-list">
          {{-- # Tabs Navigation --}}
          <nav class="nav justify-content-center" id="myTab" role="tablist">
            <a class="nav-item nav-link active"
               id="nav-home-tab"
               data-toggle="tab"
               href="#nav-home"
               role="tab"
               aria-controls="nav-home"
               aria-selected="true">Chairs</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Sofa</a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Beds</a>
          </nav>

          {{-- # Categories --}}
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
              <div class="row">

                {{-- # First Product --}}
                <div class="col-md-6 first-product">
                  <div class="product-infos">
                    <img src="https://devitems.com/preview/furnish/img/product/1.jpg" alt="">
                    <div class="all-infos">
                      <div>
                        <a href="#" class="btn-cart">Add to Cart</a>
                      </div>
                      <div>
                        <h5><a href="#">Le Parc Minotti Chair</a></h5>
                        <span class="price">
                        <b class="discount">$200</b> -
                        $169.00
                      </span>
                      </div>
                    </div>
                  </div>
                  {{-- # Category Title --}}
                  <h4>
                    <a href="#">
                      <span>Chairs</span>
                      <span class="la la-arrow-right"></span>
                    </a>
                  </h4>
                </div>

                {{-- # Second Products --}}
                <div class="col-md-6 second-products">

                  <div>
                    <div class="product-infos">
                      <img src="https://devitems.com/preview/furnish/img/product/5.jpg" alt="">
                      <div class="all-infos">
                        <div>
                          <a href="#" class="btn-cart">Add to Cart</a>
                        </div>
                        <div>
                          <h5><a href="#">Le Parc Minotti Chair</a></h5>
                          <span class="price">
                        <b class="discount">$200</b> -
                        $169.00
                      </span>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div>
                    <div class="product-infos">
                      <img src="https://devitems.com/preview/furnish/img/product/6.jpg" alt="">
                      <div class="all-infos">
                        <div>
                          <a href="#" class="btn-cart">Add to Cart</a>
                        </div>
                        <div>
                          <h5><a href="#">Le Parc Minotti Chair</a></h5>
                          <span class="price">
                        <b class="discount">$200</b> -
                        $169.00
                      </span>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>

              </div>
            </div>

            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">bbb</div>
            <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">ccc</div>
          </div>
        </div>


      </div>
    </div>
    <br/><br/><br/><br/><br/><br/><br/><br/>
  </div>

@endsection


