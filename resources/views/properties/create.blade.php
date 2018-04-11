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
<div>
  <h1>Create A Property</h1>
</div>
<div class="alert alert-info">
  <i style="font-size: 20px;"class="fa fa-info-circle" aria-hidden="true"></i>
  <p style="margin-top: 5px; margin-left: 2px; display: inline-block">
    Remember to sign up <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myreg">HERE</button>
     before listing your home!</p>
  <p>Check out our FAQ page <a href="/questions">HERE</a> for more information!</p>
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
          <strong>Target Price:</strong>
          <input id="getprice" type="string" name="price" placeholder="Buyout/Target Price" class="form-control">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Starting Bid Price:</strong>
          <input type="string" name="bidprice" placeholder="Starting Price *Optional" class="form-control">
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
          <strong>Offer Closing Time:</strong>
          <div class='input-group date' id='closingtime'>
              <input id="get_closingtime" type="text" name="date" placeholder="Date" class="form-control" readonly="readonly">
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <strong>First Open House From</strong>
          <div class='input-group date' id='firstdate'>
              <input id="get_firstdate" type="text" name="firstdate" placeholder="Date" class="form-control" readonly="readonly">
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <strong>First Open House To</strong>
          <div class='input-group date' id='seconddate'>
              <input id="get_seconddate" type="text" name="seconddate" placeholder="Date" class="form-control" readonly="readonly">
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <strong>Second Open House From</strong>
          <div class='input-group date' id='thirddate'>
              <input id="get_thirddate" type="text" name="thirddate" placeholder="Date" class="form-control" readonly="readonly">
              <span class="input-group-addon">
                  <span class="glyphicon glyphicon-calendar"></span>
              </span>
          </div>
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-6">
        <div class="form-group">
          <strong>Second Open House To</strong>
          <div class='input-group date' id='fourthdate'>
              <input id="get_fourthdate" type="text" name="fourthdate" placeholder="Date" class="form-control" readonly="readonly">
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
            <input class="form-control" id="street_number" disabled="true" name="street_address" placeholder="Street Number" readonly></input>
            <input class="form-control" id="route" disabled="true" name="route" placeholder="Street Name" readonly></input>
            <input class="form-control" id="locality" disabled="true" name="city" placeholder="City" readonly></input>
            <input class="form-control" id="country" disabled="true" name="country" placeholder="Country" readonly></input>
            <input class="form-control" id="postal_code" disabled="true" name="postal_code" placeholder="Postal Code"></input>
            <input class="form-control" id="administrative_area_level_1" disabled="true" name="state" placeholder="Province" readonly></input>
          <strong>Optional:</strong>
            <input class="form-control" id="unit" name="unit" placeholder="Unit *Not Required"></input>
            <input class="form-control" id="address_opt" name="address_opt" placeholder="Optional Address *Not Required"></input>
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
        <button type="submit" class="btn btn-primary form-control">Submit Your Property</button>
     </div>
    </div>
  </form>
</div>
  <div class="alert alert-info">
    <i style="font-size: 20px;"class="fa fa-info-circle" aria-hidden="true"></i>
    <p style="margin-top: 5px; margin-left: 2px; display: inline-block"><b>
      You will be required to sign a Property disclosure statement after you have submitted your property. An email will be sent within 24hours of submission. The property disclosure statement is designed, in part, to protect the seller by establishing that all relevant
  information concerning the premise has been provided to the buyer.</b>
    </p>
  </div>
</div>
</body>
</html>
@endsection
