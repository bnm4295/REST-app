@extends('layouts.app')


@section('content')
<section class="splash-section">
  <div class="splash-inner-media"></div>
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
<div class="container">
  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 container-contentbar">
    <div class="page-wrap">
      <div class="row row-fluid">
        <div class="col-sm-12">
          <div class="entry-content">
            <h2>Real Estate Photographers</h2>
            <a class="team-block-mobile" href="http://ishot.ca/"></a>
            <img src="{{ asset('/../images/') }}/Capture-e1502829203359.png" alt="Vincent Lee" align="team">
            <h4 class="team-name"><a href="http://ishot.ca/">Vincent Lee</a></h4>
            <p class="team-designation">iSHOT Photography</p>

            <h2>Mortgage Brokers</h2>
            <a class="team-block-mobile" href="http://nishkariley.ca"></a>
            <img src="{{ asset('/../images/') }}/10351082_325050357673857_7332476287950121693_n.jpg" alt="Nishka Riley" align="team" width="331px" height="330px">
            <h4 class="team-name"><a href="http://nishkariley.ca">Nishka Riley</a></h4>
            <p class="team-designation">Nishka Riley Mortgage Team</p>

            <h2>Real Estate Lawyesr and Notaries</h2>
            <a class="team-block-mobile" href="http://beckrobinson.com"></a>
            <img src="{{ asset('/../images/') }}/DAVE-e1502830079342.jpg" alt="David B. Rally" align="team" width="331px" height="330px">
            <h4 class="team-name"><a href="http://beckrobinson.com">David B. Rally</a></h4>
            <p class="team-designation">Beck, Robinson &amp; Company</p>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('footer')
@include('includes.footer')
@endsection
