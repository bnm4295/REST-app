@extends('layouts.app')

@section('content')

@if (session('alert'))
    <div class="alert alert-success" style="z-index: 1; text-align:center; position: absolute; width: 100%">
        <h3>{{ session('alert') }}</h3>
    </div>
@endif

<section class="splash-section">
  <div class="splash-inner-media"></div>
  <div class="splash-inner-content">
    <div id="home-container" class="container">
      <div class="splash-title">
        <h3 style="font-size: 60px;">Your Next Move</h3>
        <h2 style="font-size: 35px;">Simple. Fair. Revolutionary.</h2>
        <h1 style="font-size: 20px;">#DIYREALTY #REALESTATEREVOLUTION</h1>
      </div>
      <div class="row" style="height: 500px">
          @include('includes.advsearchhome')
      </div>
    </div>
  </div>
</section>



<div class="container">
  <div id="results">@include('includes.propertydisplay')</div>
</div>

<section class="splash-section">
  <div class="splash-inner-media"></div>
  <div class="splash-inner-content">
    <div class="container">
      <div class="row">
        <h2 style="text-align: center; color: white">
          Now You Can Save Thousands on Your Next Home Transaction
        </h2>
        <p style="text-align: center; color: white;">We charge a single flat fee and we’re donating 25% of all proceeds in support of affordable housing initiatives.
        Real estate online you can feel good about? It’s time to join the revolution.</p>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <h3 style="text-align: center;"><img class="aligncenter size-medium wp-image-1057" src="{{ asset('/../images/') }}/male-user-min.png" alt="male-user" width="60" height="60" /></h3>
          <h3 style="text-align: center;"><span style="color: #ffffff;">Connect Home Owners and Buyers</span></h3>
          <p style="text-align: center; font-size: 18px; line-height: 24px; font-weight: 400;"><span style="color: #ffffff;">Suuty gives home buyers the opportunity to learn about their investment from the person that knows best, the home owner.</span></p>
          <h3 style="text-align: center;"><img class="aligncenter size-medium wp-image-1055" src="{{ asset('/../images/') }}/picture-min.png" alt="picture" width="60" height="60" /></h3>
          <h3 style="text-align: center;"><span style="color: #ffffff;">Show Off Your House</span></h3>
          <p style="font-size: 18px; line-height: 24px; font-weight: 400; text-align: center;"><span style="color: #ffffff;">Suuty listings are equipped with all the features you won't have on Craigslist and Kijiji, so you can show off your home. </span></p>
        </div>
        <div class="col-sm-4">
          <h3 style="text-align: center;"><img class="aligncenter size-medium wp-image-1056" src="{{ asset('/../images/') }}/opened-book-min.png" alt="opened-book" width="60" height="60" /></h3>
          <h3 style="text-align: center;"><span style="color: #ffffff;">We Take Care of Paperwork</span></h3>
          <h4 style="text-align: center; font-size: 18px; line-height: 24px; font-weight: 400;"><span style="color: #ffffff;">Suuty has an easy to use legal document workflow that enables you to submit and accept legal offers through the site</span></h4>
          <h3 style="text-align: center;"><img class="aligncenter size-medium wp-image-1053" src="{{ asset('/../images/') }}/magnifier-min.png" alt="search" width="60" height="60" /></h3>
          <h3 style="text-align: center;"><span style="color: #ffffff;">Get Notified for Listings You Like</span></h3>
          <h4 style="text-align: center; font-size: 18px; line-height: 24px; font-weight: 400;"><span style="color: #ffffff;">Save search filters and receive an email notification when new listings match your criteria or if your favorited properties are updated</span></h4>
        </div>
        <div class="col-sm-4">
          <h3 style="text-align: center;"><img class="aligncenter size-medium wp-image-1054" src="{{ asset('/../images/') }}/layers-1-min.png" alt="money" width="60" height="60" /></h3>
          <h3 style="text-align: center;"><span style="color: #ffffff;">Save the Commission</span></h3>
          <h4 style="text-align: center; font-size: 18px; line-height: 24px; font-weight: 400;"><span style="color: #ffffff;">Suuty charges a flat fee of $990 upon offer acceptance. A no risk way of selling your home that will save you thousands.</span></h4>
          <h3 style="text-align: center;"><img class="aligncenter size-medium wp-image-784" src="{{ asset('/../images/') }}/heart-min.png" width="60" height="52" /></h3>
          <h3 style="text-align: center;"><span style="color: #ffffff;">Supporting Local Charities</span></h3>
          <h4 style="text-align: center; font-size: 18px; line-height: 24px; font-weight: 400;"><span style="color: #ffffff;">We believe in supporting affordable housing initiatives. 25% of all proceeds will be donated to Habitat for Humanity</span></h4>
        </div>
      </div>
    </div>
  </div>
</section>


@endsection

@section('footer')
@include('includes.footer')
@endsection
