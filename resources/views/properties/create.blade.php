@extends('layouts.app')

@section('content')

<div class="container">
<!--
<nav class="navbar navbar-inverse" style="background-color: white;">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ URL::to('properties') }}">Listings</a>
    </div>
</nav>
-->

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
<div style="float: left;">
  <h1>Create A Property</h1>
</div>
<!-- {{url('properties')}}-->
<form id="submit-property" method="post" action="{{url('properties')}}" enctype="multipart/form-data">
<meta name="csrf-token" content="{{ csrf_token() }}">
{{ csrf_field() }}
<!-- Check if user is logged in due to error output when no one is logged in -->
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Title:</strong>
          <input id="get_title" type="text" name="title" placeholder="Title" class="form-control input-lg">
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Description:</strong>
          <textarea rows="10" cols="10" name="details" placeholder="Description" class="form-control"></textarea>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Price:</strong>
          <input id="getprice" type="string" name="price" placeholder="Price" class="form-control">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Offer Closing Time:</strong>
          <div class='input-group date' id='closingtime'>
              <input id="get_closingtime" type="text" name="date" placeholder="Date" class="form-control">
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <strong>First Open House</strong>
          <div class='input-group date' id='firstdate'>
              <input id="get_firstdate" type="text" name="firstdate" placeholder="Date" class="form-control">
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <strong>Second Open House</strong>
          <div class='input-group date' id='seconddate'>
              <input id="get_seconddate" type="text" name="seconddate" placeholder="Date" class="form-control">
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Area:</strong>
          <input id="getarea" type="string" name="area" placeholder="Area" class="form-control">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>House Type:</strong>
          <select id="housetype" class="form-control" name="house_type">
            <option value="" disabled selected>House Type</option>
            <option value="SingleFamilyHome">Single Family Home</option>
            <option value="Townhouse">Townhouse</option>
            <option value="Condo">Condo</option>
          </select>
        </div>
    </div>

    <br>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <div id="map" style="width:400px; height:300px;"></div>
          <div id="infowindow-content">
            <img src="" width="16" height="16" id="place-icon">
            <span id="place-name" class="title"></span><br>
            <span id="place-address"></span>
          </div>
          <strong>Address:</strong>
            <div id="locationField">
              <input class="form-control" id="autocomplete" placeholder="Enter your address"
              onFocus="geolocate()" type="text"></input>
            </div>
            <input class="form-control" id="street_number" disabled="true" name="street_address" placeholder="Street Number"></input>
            <input class="form-control" id="route" disabled="true" name="route" placeholder="Street"></input>
            <input class="form-control" id="locality" disabled="true" name="city" placeholder="City"></input>
            <input class="form-control" id="country" disabled="true" name="country" placeholder="Country"></input>
            <input class="form-control" id="postal_code" disabled="true" name="postal_code" placeholder="Postal Code"></input>
            <input class="form-control" id="administrative_area_level_1" disabled="true" name="state" placeholder="State"></input>
        </div>
    </div>
          <input id="getlat" type="hidden" name="latitude" placeholder="latitude" class="form-control" readonly>
          <input id="getlong" type="hidden" name="longitude" placeholder="longitude" class="form-control" readonly>


    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Beds:</strong>
            <input id="getbeds" type="number" name="number_of_beds" placeholder="Beds" class="form-control">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Baths:</strong>
            <input id="getbaths" type="number" name="number_of_baths" placeholder="Baths" class="form-control">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>ImageUpload:</strong>
            <input type="file" name="images[]" multiple>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
      <div class="form-group">
        <button id="submit-property-btn" type="submit" name="submit" class="btn btn-primary form-control" onclick="return confirm('We will be sending an electronic Non-Disclosure document for you to sign shortly after your submission. Would you like to submit your property?')">Submit Your Property</button>
      </div>
    </div>
  </form>
</div>
</div>
</body>
</html>
@endsection
