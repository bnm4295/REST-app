@extends('layouts.app')

@include('includes.socialshare')
@section('content')

@if (session('alert'))
  <div class="alert alert-success" style="z-index: 2; text-align:center; position: absolute; width: 100%">
      <h3>{{ session('alert') }}</h3>
  </div>
@endif

@if (Session::has('danger'))
	<div class="alert alert-danger danger-notification"  style="z-index: 2; text-align:center; position: absolute; width: 100%">{{ Session::get('danger') }}</div>
@endif

@if (Session::has('success'))
	<div class="alert alert-success"  style="z-index: 2; text-align:center; position: absolute; width: 100%">{{ Session::get('success') }}</div>
@endif

<section class="splash-section">
  <div id="front-page-media" class="splash-inner-media"></div>
  <div class="splash-inner-content">
    <div id="home-container" class="container">
      <div class="splash-title">
        <h1 style="font-family: 'Helvetica Neue', sans-serif; font-size: 48px; font-weight: bold; letter-spacing: -1px; line-height: 1;">
          <span>Your Next Move</span>
          <div><span>Simple. Fair. Revolutionary.</span>
          </div>
        </h1>
        <h4 style="font-size: 15px;">#DIYREALTY #REALESTATEREVOLUTION</h4>
      </div>
      @include('includes.advsearchhome')
    </div>
  </div>
</section>



<div class="container">
  <div id="results">@include('includes.propertydisplay')</div>
</div>

<section class="splash-section">
  <div class="splash-inner-media" style="background-image: url(/images/living-7.jpg);"></div>
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
          <h3 style="text-align: center;"><img src="{{ asset('/../images/') }}/male-user-min.png" alt="male-user" width="60" height="60" /></h3>
          <h4 style="text-align: center;"><span style="color: #ffffff;">Connect Home Owners and Buyers</span></h4>
          <p style="text-align: center; font-size: 18px; line-height: 24px; font-weight: 400;"><span style="color: #ffffff;">Suuty gives home buyers the opportunity to learn about their investment from the person that knows best, the home owner.</span></p>
          <h3 style="text-align: center;"><img src="{{ asset('/../images/') }}/picture-min.png" alt="picture" width="60" height="60" /></h3>
          <h4 style="text-align: center;"><span style="color: #ffffff;">Show Off Your House</span></h4>
          <p style="font-size: 18px; line-height: 24px; font-weight: 400; text-align: center;"><span style="color: #ffffff;">Suuty listings are equipped with all the features you won't have on Craigslist and Kijiji, so you can show off your home. </span></p>
        </div>
        <div class="col-sm-4">
          <h3 style="text-align: center;"><img src="{{ asset('/../images/') }}/opened-book-min.png" alt="opened-book" width="60" height="60" /></h3>
          <h4 style="text-align: center;"><span style="color: #ffffff;">We Take Care of Paperwork</span></h4>
          <h4 style="text-align: center; font-size: 18px; line-height: 24px; font-weight: 400;"><span style="color: #ffffff;">Suuty has an easy to use legal document workflow that enables you to submit and accept legal offers through the site</span></h4>
          <h3 style="text-align: center;"><img src="{{ asset('/../images/') }}/magnifier-min.png" alt="search" width="60" height="60" /></h3>
          <h4 style="text-align: center;"><span style="color: #ffffff;">Get Notified for Listings You Like</span></h4>
          <h4 style="text-align: center; font-size: 18px; line-height: 24px; font-weight: 400;"><span style="color: #ffffff;">Save search filters and receive an email notification when new listings match your criteria or if your favorited properties are updated</span></h4>
        </div>
        <div class="col-sm-4">
          <h3 style="text-align: center;"><img src="{{ asset('/../images/') }}/layers-1-min.png" alt="money" width="60" height="60" /></h3>
          <h4 style="text-align: center;"><span style="color: #ffffff;">Save the Commission</span></h4>
          <h4 style="text-align: center; font-size: 18px; line-height: 24px; font-weight: 400;"><span style="color: #ffffff;">Suuty charges a flat fee of $990 upon offer acceptance. A no risk way of selling your home that will save you thousands.</span></h4>
          <h3 style="text-align: center;"><img src="{{ asset('/../images/') }}/heart-min.png" width="60" height="52" /></h3>
          <h4 style="text-align: center;"><span style="color: #ffffff;">Supporting Local Charities</span></h4>
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
