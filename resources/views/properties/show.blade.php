@extends('layouts.app')
@include('includes.socialshare')
@section('content')

@if (Session::has('success'))
  <div class="alert alert-success"  style="z-index: 2; text-align:center; position: absolute; width: 100%">{{ Session::get('success') }}</div>
@endif
<div class="container">
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <h1 style="color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 40px; font-weight: bold; letter-spacing: -1px; line-height: 1;">{{$property->title}}</h1>
  <h5>{{$property->street_address}} {{$property->route}} {{$property->city}} {{$property->state}}, {{$property->postal_code}} {{$property->country}}</h5>
  <h2 id="pricenum" style="color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 40px; font-weight: bold; letter-spacing: -1px; line-height: 1;">
    {{$property->price}}</h2>
  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12 no-padding" style="float: left;">
      <div class="fotorama" data-nav="thumbs">
        <?php
          $decodedarr = json_decode( $property->images , true);
          $counter = count($decodedarr);
          for ($i = 0 ; $i < $counter; $i++ ){
            $image = $decodedarr[$i];
            echo $decodedarr[$i];
        ?>
          <!--img class="img-rounded" style="height: 230px; width: 100%" src="{{ asset('/../images/') }}/{{$image}}"/>-->
          <img src="{{ asset('/../images/') }}/{{$image}}" alt="property-images">
        <?php } ?>
      </div>
      <!-- PANEL START -->
      <div class ="panel panel-default">
        <div class="panel-title">
          <h4>Details of Property</h4>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="panel-heading" style="text-align: center">
              <h4>Area(sqft): {{$property->area}}</h4>
              <h4>House Type: {{$property->house_type}}</h4>
              <h4>Beds: {{$property->number_of_beds}} | Baths: {{$property->number_of_baths}}</h4>
            </div>
          </div>
        </div>
        &nbsp;
        <div class="panel-title">
          <h4>Description of Property</h4>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="panel-heading">
              <b><p style="line-height: 200%;">{{$property->details}}</p></b>
            </div>
          </div>
        </div>
        &nbsp;
        <div class="panel-title">
          <h4>Ending Date - {{$property->date}}</h4>
        </div>
        <div data-countdown= "{{$property->date}}" style="text-align: center; font-size: 50px; background-color: #00a79d;
          color: white; margin-bottom: 20px;">
        </div>
        <?php
          date_default_timezone_set('America/Los_Angeles');
          $date=strtotime($property->date);
          $remaining = $date - time();

          if($remaining < 0){
            $remaining = 0;
          }

         ?>
        <div class="panel-heading">
          @foreach($offers as $offer)
             @if($remaining == 0 && $offer->status == 1 && $property->user_id == Auth::id())
                &nbsp;
                <form action="{{action('PaymentController@create')}}" method="GET" style="float: left;">
                  <meta name="csrf-token" content="{{ csrf_token() }}">
                  {{ csrf_field() }}
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="select-email" value="{{$offer->user_id}}">
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <input style="position: relative; top: 16px;" id="payment-btn" value="Select" type="submit" name="submit" class="btn btn-primary"></input>
                  </div>
                </form>
              @endif
                <b><h4 id="bidprice">Bid Price: ${{$offer['offerprice']}}</h4></b>
              @if($offer->status == 0)
                <h5><b>Status: Waiting for Approval</b></h5>
                <br>
                <br>
              @else
                <h5><b>Status: Approved</b></h5>
                <br>
                <br>
              @endif
          @endforeach
        </div>
        <div class="panel-title">
          <h4>Open-House Times</h4>
        </div>
        <div class="panel-heading">
          <h4>{{$property->firstdate}}</h4>
          <h4>{{$property->seconddate}}</h4>
        @if(($property->firstdate && $property->seconddate) == NULL)
          <h4>No Open-House Dates</h4>
        @endif
        </div>
        <div class="panel-title">
          <h4>Offer Form</h4>
        </div>
        <div class="panel-heading">
          @if($remaining>0)
              <h4 style="color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 20px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;">Send an Offer</h4>
              <form id="offer-property" action="{{action('OfferController@store')}}" method="post" enctype="multipart/form-data">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                {{ csrf_field() }}
                <input type="hidden" name="prop_id" value="{{$property->id}}">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                          <b>Name:</b>
                          <input type="text" name="name" placeholder="Your Name" class="form-control input-lg">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                          <b>Offer Amount:</b>
                          <input type="text" name="offerprice" placeholder="Enter the dollar amount of your offer for this property" class="form-control input-lg">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                          <textarea rows="5" cols="5" name="comments" placeholder="Additional Comments or Notes" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                      <input id="submit-offer" type="submit" name="submit" class="btn btn-primary form-control" onclick="return confirm('Your offer will be submitted. We will forward you an email for the next step to make this offer legitimate.')"></input>
                    </div>
                </div>
              </form>
            @else
              <h4>Offer Period is Over</h4>
            @endif
          </div>
          <div class="panel-title">
            <h4>Contact Form</h4>
          </div>
          <div class="panel-heading">
            <div class="row">
              <h3 style=" color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 20px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;">
                Send a Message</h3>
              <form action="{{ route('messages.store') }}" method="post">
                {{ csrf_field() }}
                <div class="col-xs-12 col-sm-12 col-md-12">
                  <!-- Subject Form Input -->
                  <div class="form-group">
                    <label class="control-label">Subject</label>
                    <input type="text" class="form-control" name="subject" placeholder="Subject"
                    value="{{ old('subject') }}">
                  </div>

                  <!-- Message Form Input -->
                  <div class="form-group">
                    <label class="control-label">Message</label>
                    <textarea name="message"  placeholder="Your Message" class="form-control">{{ old('message') }}</textarea>
                  </div>

                  <div class="checkbox">
                    <input type="hidden" name="recipients[]" value="{{ $owner->id }}" checked>
                  </div>

                  <!-- Submit Form Input -->
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary form-control" onclick="return confirm('Message will be submitted. Check your message box for further conversation.')">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="panel-title">
            <h4>Walkscore</h4>
          </div>
          <div class="panel-heading">
              @include('includes.walkscore')
          </div>
      </div>
      <!-- PANEL END-->
      <!-- COL END -->
    </div>
    <!-- Widget START -->
    <div class="col-md-6 col-sm-6 col-xs-12 no-padding" style="margin: 20px width: 100%;">
        <input id="showmaplat" type="hidden" value="{{$property->latitude}}">
        <input id="showmaplong" type="hidden" value="{{$property->longitude}}">
        <div id="floating-panel">
          <input class="btn btn-primary" type="button" value="Toggle Street View" onclick="toggleStreetView();"></input>
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
    <div class="col-md-6 col-sm-6 col-xs-12">
      <div class="container reviewform">
        <form method="post" action="{{url('post-booking')}}" enctype="multipart/form-data">
          <meta name="csrf-token" content="{{ csrf_token() }}">
          {{ csrf_field() }}
          <input type="hidden" name="prop_id" value="{{$property->id}}">
            <div class="form-group">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <h3>Request a Viewing Time</h3>
                <strong>Name</strong>
                  @if(Auth::check())
                    <input name="name" class="form-control" value="{{Auth::user()->name}}"></input>
                  @else
                    <input name="name" class="form-control"></input>
                  @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <strong>Email</strong>
                @if(Auth::check())
                  <input name="email" class="form-control" value="{{Auth::user()->email}}"></input>
                @else
                  <input name="email" class="form-control"></input>
                @endif
              </div>
            </div>

            <div class="form-group">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                  <strong>Message:</strong>
                  <textarea rows="5" cols="5" name="description" placeholder="Description" class="form-control"></textarea>
                </div>
              </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <strong>First Open House</strong>
                  <div class='input-group date' id='openfirst'>
                      <input id="get_firstdate" type="text" name="openfirst" placeholder="Date" class="form-control">
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <strong>Second Open House</strong>
                  <div class='input-group date' id='opensecond'>
                      <input id="get_firstdate" type="text" name="opensecond" placeholder="Date" class="form-control">
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: right">
              <input type="submit" name="submit" class="btn btn-primary"></input>
            </div>
        </form>
      </div>
      &nbsp;
    </div>
     <!-- Widget END -->
  </div>
  <!-- ROW END -->
</div>
@endsection
