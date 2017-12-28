@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    @include('layouts/page-breadcrumbs')
    <div class="page-container">
      @include('blog/content-page')

      <div class="row page-infos">
        <div class="col-md-5 pg-left">
          <div>
            <h3>Our Story</h3>
            <p>
              Hand in hand, we promise to find and deliver the most eclectic and unordinary
              styles in limited quantities to preserve your individuality.
              There are no rules, we are led by our hearts and a healthy
              dose of imagination in selecting the pieces we choose to stock.
            </p>
            <p>
              A fusion of Bohemian chic, Indie love, and edgy Rock, Jakiro brings
              you a finely curated assortment of vintage-inspired clothing,
              accessories, shoes, and even decorative items
            </p>
          </div>

          <div>
            <h3>Contact us</h3>
            <ul>
              <li><b>Address:</b> 1234 New Design St, Melbourne, Australia.</li>
              <li><b>Email:</b> admin@lunartheme.com</li>
              <li><b>Phone:</b> (0091) 8547 632521</li>
              <li><b>Hour Work:</b> Monday - Friday /  <b>08pm - 05pm</b></li>
            </ul>
          </div>
        </div>

        <div class="col-md-7 pg-right">
          <img src="http://dailycomfort.test/wp-content/uploads/2017/12/team.jpg" alt="">
        </div>

      </div>

      <div class="row page-services-list no-gutters">
        <div class="col-md-6 services-img">
          <img src="http://dailycomfort.test/wp-content/uploads/2017/12/service1.jpg" alt="">
        </div>
        <div class="col-md-6 services-list">
          <div>
            <h3>Design</h3>
            <ul>
              <li>- Taxes and Accounting</li>
              <li>- Analysis of profitability</li>
              <li>- Financial modeling and planning</li>
              <li>- Profit model</li>
              <li>- and much more</li>
            </ul>
            <a href="#" class="btn btn-light">Prices<i class="arrow"></i></a>
          </div>
        </div>
      </div>

      <div class="row page-services-list no-gutters">
        <div class="col-md-6 services-list">
          <div>
            <h3>Design</h3>
            <ul>
              <li>- Taxes and Accounting</li>
              <li>- Analysis of profitability</li>
              <li>- Financial modeling and planning</li>
              <li>- Profit model</li>
              <li>- and much more</li>
            </ul>
            <a href="#" class="btn btn-light">Prices<i class="arrow"></i></a>
          </div>
        </div>
        <div class="col-md-6 services-img">
          <img src="http://dailycomfort.test/wp-content/uploads/2017/12/service2.jpg" alt="">
        </div>
      </div>

      <div class="row page-services-list no-gutters">
        <div class="col-md-6 services-img">
          <img src="http://dailycomfort.test/wp-content/uploads/2017/12/service3.jpg" alt="">
        </div>
        <div class="col-md-6 services-list">
          <div>
            <h3>Design</h3>
            <ul>
              <li>- Taxes and Accounting</li>
              <li>- Analysis of profitability</li>
              <li>- Financial modeling and planning</li>
              <li>- Profit model</li>
              <li>- and much more</li>
            </ul>
            <a href="#" class="btn btn-light">Prices<i class="arrow"></i></a>
          </div>
        </div>
      </div>


    </div>
  @endwhile
@endsection
