@extends('layouts.app')

<head>
  <script src="https://a.mailmunch.co/app/v1/site.js" id="mailmunch-script" data-mailmunch-site-id="430047" async="async"></script>
</head>
@include('includes.socialshare')
@section('content')

@if (session('alert'))
  <div class="alert alert-success" style="z-index: 2; text-align:center; position: absolute; width: 100%">
      <h3>{{ session('alert') }}</h3>
  </div>
@endif

@if ($errors->any())
  <div class="alert alert-danger danger-notification"  style="z-index: 2; position: absolute; width: 100%">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
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
        <h1 style="font-size: 48px; font-weight: bold; text-indent: 35px; letter-spacing: -1px; line-height: 1;">
          <span>Your Next Move.</span>
        </h1>
        <h3 style="font-weight: bold; letter-spacing: -1px; line-height: 1;">
          <span>Buy or Sell Your Home Online, NO Realtor's Fees.</span>
        </h3>
        <h4 style="font-size: 15px; letter-spacing: -1px; line-height: 1;">List your home, find a home, schedule showings, make offers, accept offers, and transfer documents, all on Suuty.</h4>
      </div>
      @include('includes.advsearchhome')
    </div>
  </div>
</section>

<div class="container panel-collapse">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-contentbar">
    <h3 style="font-family: 'Helvetica Neue', sans-serif; font-size: 30px; font-weight: bold; letter-spacing: -1px;">How It Works</h3>
    <h4 style="font-family: 'Helvetica Neue', sans-serif; font-weight: bold; letter-spacing: -1px;">Suuty makes it easy to buy or sell your home online, with no realtor's fees</h4>
    <hr>
    <h3><strong>For Buyers</strong></h3>
    <div class="panel-group">
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#home1">
          <div class="panel-heading">
            <div class="panel-title">
                <h3><b>List Your Home</b></h3>
            </div>
          </div>
        </a>
        <div id="home1" class="panel-collapse collapse">
          <div class="panel-body"><h4>Suuty’s easy and complete listing features let you show off your home.</h4>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#home2">
          <div class="panel-heading">
            <div class="panel-title">
              <h3><b>Market Your Home</b></h3>
            </div>
          </div>
        </a>
        <div id="home2" class="panel-collapse collapse">
          <div class="panel-body">
            <h4>Schedule open houses or private showings at times that work for you.</h4>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#home3">
          <div class="panel-heading">
            <div class="panel-title">
              <h3><b>Transparent Process</b></h3>
            </div>
          </div>
        </a>
        <div id="home3" class="panel-collapse collapse">
          <div class="panel-body">
            <h4>View all offers, negotiate, and accept offers with buyers directly through Suuty.</h4>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#home4">
          <div class="panel-heading">
            <div class="panel-title">
              <h3><b>Secure & Legal Paperwork</b></h3>
            </div>
          </div>
        </a>
        <div id="home4" class="panel-collapse collapse">
          <div class="panel-body">
            <h4>Suuty creates and transfers the legal documents required, so buyers and sellers can make and accept legal offers through our secure platform.</h4>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#home5">
          <div class="panel-heading">
            <div class="panel-title">
              <h3><b>Save Money</b></h3>
            </div>
          </div>
        </a>
        <div id="home5" class="panel-collapse collapse">
          <div class="panel-body">
            <h4>No realtor’s fees, just a flat $990 when you accept an offer. A portion of Suuty’s revenues support Habitat For Humanity.</h4>
          </div>
        </div>
      </div>
      <!-- END PANEL COLLAPSE -->
    </div>
  </div>
</div>

<div class="container panel-collapse">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 container-contentbar">
    <h3><strong>For Sellers</strong></h3>
    <div class="panel-group">
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#home6">
          <div class="panel-heading">
            <div class="panel-title">
              <h3><b>Find Your Home</b></h3>
            </div>
          </div>
        </a>
        <div id="home6" class="panel-collapse collapse">
          <div class="panel-body">
            <h4>Find the perfect property with our powerful browse, search and filter features, or be notified for new listings you'll like.</h4>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#home7">
          <div class="panel-heading">
            <div class="panel-title">
              <h3><b>Transparent Process</b></h3>
            </div>
          </div>
        </a>
        <div id="home7" class="panel-collapse collapse">
          <div class="panel-body">
            <h4>No more hidden bids! View all other offers on a property, so you can decide if you want to make an offer, and for how much.</h4>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#home8">
          <div class="panel-heading">
            <div class="panel-title">
              <h3><b>Secure & Legal Paperwork</b></h3>
            </div>
          </div>
        </a>
        <div id="home8" class="panel-collapse collapse">
          <div class="panel-body">
            <h4>Suuty creates and transfers the legal documents required, so buyers and sellers can make and accept legal offers through our secure platform.</h4>
          </div>
        </div>
      </div>
      <div class="panel panel-default">
        <a data-toggle="collapse" data-parent="#accordion" href="#home9">
          <div class="panel-heading">
            <div class="panel-title">
              <h3><b>Housing for Everyone</b></h3>
            </div>
          </div>
        </a>
        <div id="home9" class="panel-collapse collapse">
          <div class="panel-body">
            <h4>A portion of the $990 flat fee a seller pays when an offer is accepted goes to support Habitat for Humanity</h4>
          </div>
        </div>
      </div>
      <!-- END PANEL COLLAPSE -->
    </div>
  </div>
</div>
&nbsp;
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
<div class="container">
  <div id="results">@include('includes.propertydisplay')</div>
</div>
<div class="container">
  <h4 style="text-align: center; line-height: 200%; font-weight: bold">At Suuty, we believe in housing for all. That’s we give a percentage of our revenues (the $990 flat fee sellers pay when they accept an offer on their home) to Habitat for Humanity.

    Find out more about Habitat for Humanity <a href="{{URL::to('about')}}">HERE</a> and other ways you can get involved supporting housing for all in your local community.
    <img style="display: block; margin-left: auto; margin-right: auto;" src="/images/Teal-Large.png" alt="logo" width="160px" height="80px"></img>
  <!--p>
    <button class="btn btn-primary btn-lg" style="border-radius: 5px" onclick="window.location.href='{{ URL::to('properties') }}'">View More Listings</button>
    <button class="btn btn-primary btn-lg" style="border-radius: 5px" onclick="window.location.href='{{ URL::to('properties/create') }}'">List Your Home</button>
  </p>-->
</h4>
</div>


@endsection

@section('footer')
@include('includes.footer')
@endsection
