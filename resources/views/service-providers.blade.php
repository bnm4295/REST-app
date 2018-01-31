@extends('layouts.app')


@section('content')
<section class="splash-section">
  <div id="services-media" class="splash-inner-media"></div>
  <div class="splash-inner-content">
    <div class="container">
      <div id="home-container" class="container">
        <div class="splash-title">
          <h1><p style="text-align: center; font-size: 50px; color: white">Service Providers</p></h1>
        </div>
      </div>
      <div class="row" style="height: 500px">
      </div>
    </div>
  </div>
</section>
<div class="container-fluid" style="background: white">
    <div class="page-wrap">
      <div class="row">
        <div style="margin: 20px;">
            <div class="col-md-4">
              <h4>Real Estate Photographers</h4>
              <a class="team-block-mobile" href="http://ishot.ca/"></a>
              <img src="{{ asset('/../images/') }}/Capture-e1502829203359.png" alt="Vincent Lee" align="team" width="331px" height="330px">
              <h4 class="team-name"><a href="http://ishot.ca/">Vincent Lee</a></h4>
              <p class="team-designation">iSHOT Photography</p>
            </div>
            <div class="col-md-4">
              <h4>Mortgage Brokers</h4>
              <a class="team-block-mobile" href="http://nishkariley.ca"></a>
              <img src="{{ asset('/../images/') }}/10351082_325050357673857_7332476287950121693_n.jpg" alt="Nishka Riley" align="team" width="331px" height="330px">
              <h4 class="team-name"><a href="http://nishkariley.ca">Nishka Riley</a></h4>
              <p class="team-designation">Nishka Riley Mortgage Team</p>
            </div>
            <div class="col-md-4">
              <h4>Real Estate Lawyers and Notaries</h4>
              <a class="team-block-mobile" href="http://beckrobinson.com"></a>
              <img src="{{ asset('/../images/') }}/DAVE-e1502830079342.jpg" alt="David B. Rally" align="team" width="331px" height="330px">
              <h4 class="team-name"><a href="http://beckrobinson.com">David B. Rally</a></h4>
              <p class="team-designation">Beck, Robinson &amp; Company</p>
            </div>
        </div>
      </div>
    </div>
    <hr>
  <div class="row" style="padding-bottom:20px;">
    <div style="display:table; margin:0 auto; width: 50%">
      @include('includes.createform')
    </div>
  </div>
</div>
@endsection
@section('footer')
@include('includes.footer')
@endsection
