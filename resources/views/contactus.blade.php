@extends('layouts.app')


@section('content')

<div class="container">
  <h2>Contact Us</h2>
  <hr>
  <h3><b>Address: 1250 - 789 West Pender Street</b></h3>
  <h3><b>Phone Number: 604-346-5185</b></h3>
  <h3><b>Email: <a href="mailto:connect@suuty.com">connect@suuty.com</a></b></h3>
  <div class="col-md-12 col-sm-12 col-xs-12 no-padding" style="width: 100%;">
    <input id="showmaplat" type="hidden" value="49.2850947">
    <input id="showmaplong" type="hidden" value="-123.1155744">
    <div id="floating-panel">
      <input type="image" src="{{ asset('/../images/') }}/Street_View_logo.png" value="Show Street View" width="45" height="45" onclick="toggleStreetView();"></input>
    </div>
    <div id="showmap" style="width: 100%; height: 500px;">
    </div>
    <!--div style="margin-left: 30px;">
    <h2 style="font-family:stagsans,arial,helvetica,sans-serif;font-size:1.6em;font-weight:400;margin-top:0">
    <a href="/best-mortgage-rates" style="text-decoration:none;color:#A3C139;">Mortgage rate comparison</a>
  </h2>
  <div class="widget" data-widget="mtg-table" data-purchase="true" data-lang="en">
</div>
<div style="text-align:right;">
<a href="https://www.ratehub.ca/" style="display:inline-block;width:80px;margin-top:.5em;margin-top:-1em">
<img src="https://www.ratehub.ca/assets/images/widget-logo.png" style="width:100%;" alt="RateHub logo"></a>
</div>
</div>-->
</div>
&nbsp;
  <div class="marginfix" style="text-align: center;">
    <button class="btn btn-primary btn-lg" style="border-radius: 5px" onclick="window.location.href='{{ URL::to('properties') }}'">Find Your Home</button>
    <button class="btn btn-primary btn-lg" style="border-radius: 5px" onclick="window.location.href='{{ URL::to('properties/create') }}'">List Your Home</button>
  </div>

</div>

@endsection


@section('footer')
@include('includes.footer')
@endsection
