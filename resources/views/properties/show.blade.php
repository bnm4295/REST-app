@extends('layouts.app')

@section('content')

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

  <strong><h2>{{$property->title}}</h2></strong>
  <div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12 no-padding" style="float: left;">
      <div class="fotorama" data-nav="thumbs">
        <?php
          $decodedarr = json_decode( $property->images , true);
          $counter = count($decodedarr);
          for ($i = 0 ; $i < $counter; $i++ ){
            $image = $decodedarr[$i];
            //$image = $decodedarr[0];
            echo $decodedarr[$i];
        ?>
          <!--img class="img-rounded" style="height: 230px; width: 100%" src="{{ asset('/../images/') }}/{{$image}}"/>-->
          <img src="{{ asset('/../images/') }}/{{$image}}">
        <?php } ?>
      </div>
      <!-- PANEL START -->
      <div class ="panel panel-default">
        <div class="panel-heading">
          <div class="row justify-content-md-center">
            <div class="col col-sm-6">
              <p><strong>Price: ${{$property->price}}</strong></p>
              <p><strong>Area(sqft): {{$property->area}}</strong></p>
              <p><strong>Type: {{$property->house_type}}</strong></p>
              <p><strong>Beds: {{$property->number_of_beds}}</strong></p>
              <p><strong>Baths: {{$property->number_of_baths}}</strong></p>
            </div>
            <div class="col col-sm-6">
              @if($property->street_address && $property->route == NULL)
                <p><strong>Address: Not Provided</strong></p>
              @else
                <p><strong>Address: {{$property->street_address}} {{$property->route}}</strong></p>
              @endif
              <p><strong>City: {{$property->city}}</strong></p>
              <p><strong>Province: {{$property->state}}</strong></p>
              <p><strong>Country: {{$property->country}}</strong></p>
              @if($property->postal_code == NULL)
                <p><strong>Postal Code: N/A</strong></p>
              @else
                <p><strong>Postal Code: {{$property->postal_code}}</strong></p>
              @endif
            </div>
            <!--div class="panel-body" style="width: 500px; margin-right: auto; margin-left: auto;">
          </div>-->
        </div>
          <hr>
          <h3>Description</h3>
          <strong><p style="text-indent: 2em; line-height: 200%;">{{$property->details}}</p></strong>
          <hr>
          <p style="text-align: right;"><b>ENDING DATE: {{$property->date}}</b></p>
          <strong><div data-countdown= "{{$property->date}}" style="font-size: 50px; text-align: center;"></div></strong>
          <?php
            date_default_timezone_set('America/Los_Angeles');
            $date=strtotime($property->date);
            $remaining = $date - time();
            /*
            echo "<br>";
            echo $date;
            echo "<br>";
            echo time();
            echo "<br>";*/
            if($remaining < 0){
              $remaining = 0;
            }
            //echo $remaining;
           ?>
          @foreach($offers as $offer)
            @if($property->user_id == Auth::id())
              @if($remaining == 0 && $offer->status == 1)
                &nbsp;
                <form action="{{action('PaymentController@create')}}" method="GET" style="float: left;">
                  <meta name="csrf-token" content="{{ csrf_token() }}">
                  {{ csrf_field() }}
                  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <input id="payment-btn" value="Select" type="submit" name="submit" class="btn btn-primary"></input>
                  </div>
                </form>
              @endif
              <strong><b>$</b>{{$offer['offerprice']}}</strong>
              <br>
              @if($offer->status == 0) <!-- change this value to 1 in admin if approved -->
                <b>Status: Waiting for Approval</b>
              @else
                <b>Approved</b>
                &nbsp;
              @endif
            @endif
          @endforeach
          <hr>
          <!-- when countdown hits 0 all offers will stop and property owner can select -->
          <!-- disable the form -->
          <!-- Can select one approved offer -->
          @if(Auth::check() && $remaining>0)
            <form id="offer-property" action="{{action('OfferController@store')}}" method="post" enctype="multipart/form-data">
              <meta name="csrf-token" content="{{ csrf_token() }}">
              {{ csrf_field() }}
              <input type="hidden" name="prop_id" value="{{$property->id}}">
              <div class="row">
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" placeholder="Your Name" class="form-control input-lg">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                        <strong>Offer Amount:</strong>
                        <input type="text" name="offerprice" placeholder="Enter the dollar amount of your offer for this property" class="form-control input-lg">
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12">
                      <div class="form-group">
                        <textarea rows="5" cols="5" name="comments" placeholder="Additional Comments or Notes" class="form-control"></textarea>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <input id="submit-offer" type="submit" name="submit" class="btn btn-primary" onclick="return confirm('Your offer will be submitted. We will forward you an email for the next step to make this offer legitimate.')"></input>
                  </div>
              </div>
            </form>
          @else
          @endif
          <hr>
          <div class="row">
            <h1 style="text-align: center">Send a Message</h1>
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
                  <textarea name="message" class="form-control">{{ old('message') }}</textarea>
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
      </div>
      <!-- PANEL END-->
      <!-- COL END -->
    </div>
    <!-- Widget START -->
    <div class="col-md-6 col-sm-6 col-xs-12 no-padding" style="margin: 20px width: 300px;">
        <input id="showmaplat" type="hidden" value="{{$property->latitude}}">
        <input id="showmaplong" type="hidden" value="{{$property->longitude}}">
        <div id="floating-panel">
          <input class="btn btn-primary" type="button" value="Toggle Street View" onclick="toggleStreetView();"></input>
        </div>
        <div id="showmap" style="width: 500px; height: 500px;">
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
     <!-- Widget END -->
  </div>
  <!-- ROW END -->
</div>



@endsection
