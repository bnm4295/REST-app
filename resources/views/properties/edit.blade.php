@extends('layouts.app')

@section('content')

@if(session('alert'))
  <div class="alert alert-success">
      {{ session('alert') }}
  </div>
@endif

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@if (Auth::id() == $property->user_id || (Auth::guard('admin')->check() == true ))
<div class="container">
  <form id="submit-edit" method="post" action="{{ action('PropertyController@update', $id )}}" enctype="multipart/form-data">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PATCH">
                <strong>Title:</strong>
                <input id="edit-title" type="text" name="title" placeholder="Title" class="form-control input-lg" value="{{$property->title}}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea rows="10" cols="10" name="details" placeholder="Description" class="form-control">{{$property->details}}</textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Price:</strong>
                <input id="edit-price" type="integer" name="price" placeholder="Price" class="form-control" value="{{$property->price}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Area:</strong>
                <input id="edit-area" type="string" name="area" placeholder="Area" class="form-control" value="{{$property->area}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>House Type:</strong>
                <input type="text" name="house_type" placeholder="Type" class="form-control" value="{{$property->house_type}}">
            </div>
        </div>

        <div class='col-sm-6'>
            <div class="form-group">
              <strong>Offer Closing Time:</strong>
              <div class='input-group date' id='closingtime'>
                  <input id="get_closingtime" type="text" name="date" placeholder="Date" class="form-control" value="{{$property->date}}">
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                  </span>
              </div>
            </div>
        </div>

        <div class='col-sm-6'>
            <div class="form-group">
              <strong>First Open House</strong>
              <div class='input-group date' id='firstdate'>
                  <input id="get_firstdate" type="text" name="firstdate" placeholder="Date" class="form-control" value="{{$property->firstdate}}">
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                  </span>
              </div>
            </div>
        </div>

        <div class='col-sm-6'>
            <div class="form-group">
              <strong>Second Open House</strong>
              <div class='input-group date' id='seconddate'>
                  <input id="get_seconddate" type="text" name="seconddate" placeholder="Date" class="form-control" value="{{$property->seconddate}}">
                  <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                  </span>
              </div>
            </div>
        </div>

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
                <input id="edit-check" type="hidden" value="1">
                <input class="form-control" id="street_number" disabled="true" name="street_address" placeholder="Street Number" value="{{$property->street_address}}"></input>
                <input class="form-control" id="route" disabled="true" name="route" placeholder="Street" value="{{$property->route}}"></input>
                <input class="form-control" id="locality" disabled="true" name="city" placeholder="City" value="{{$property->city}}"></input>
                <input class="form-control" id="country" disabled="true" name="country" placeholder="Country" value="{{$property->country}}"></input>
                <input class="form-control" id="postal_code" disabled="true" name="postal_code" placeholder="Postal Code" value="{{$property->postal_code}}"></input>
                <input class="form-control" id="administrative_area_level_1" disabled="true" name="state" placeholder="State" value="{{$property->state}}"></input>
              <!--input id="address" type="text" name="address" placeholder="address" class="form-control">-->
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Latitude:</strong>
              <input id="getlat" type="text" name="latitude" placeholder="latitude" class="form-control" value="{{$property->latitude}}" readonly>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <strong>Longitude:</strong>
              <input id="getlong" type="text" name="longitude" placeholder="longitude" class="form-control" value="{{$property->longitude}}" readonly>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
              <input type="hidden" name="hideshow" placeholder="hide or show" class="form-control" value="{{$property->hideshow}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Beds:</strong>
                <input type="number" name="number_of_beds" placeholder="Beds" class="form-control" value="{{$property->number_of_beds}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Baths:</strong>
                <input type="number" name="number_of_baths" placeholder="Baths" class="form-control" value="{{$property->number_of_baths}}">
                <input type="hidden" name="sold" class="form-control" value="{{$property->sold}}">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ImageUpload:</strong>
                <input type="file" name="images[]" multiple>
            </div>
        </div>

        <div class="col-lg-3 text-center">
        <?php
          $decodedarr = json_decode( $property['images'] , true);
          $counter = count($decodedarr);
        ?>
        <?php
          for ($i = 0 ; $i < $counter; $i++ ){
            $image = $decodedarr[$i];
            echo $decodedarr[$i];
        ?> <img class="img-rounded" style="height: 230px; width: 100%" src="{{ asset('/../images/') }}/{{$image}}"/>
        <?php } ?>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <input id="submit-edit-btn" type="submit" name="submit" class="btn btn-primary"></input>
        </div>
    </div>

</div>
@else
<p>You do not have permission to edit this content</p>
@endif
@endsection
