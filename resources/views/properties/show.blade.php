@extends('layouts.app')
@include('includes.socialshare')
@section('content')

@if (Session::has('success'))
  <div class="alert alert-success"  style="z-index: 2; text-align:center; position: absolute; width: 100%">{{ Session::get('success') }}</div>
@endif
<div class="container showprop">
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <h1 style="color: #111; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;font-size: 40px; font-weight: bold; letter-spacing: -1px; line-height: 1;">{{$property->title}}</h1>
  <h5>{{$property->street_address}} {{$property->route}} {{$property->city}} {{$property->state}}, {{$property->postal_code}} {{$property->country}}</h5>
  <h2 id="pricenum" style="color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 40px; font-weight: bold; letter-spacing: -1px; line-height: 1;">
    ${{$property->price}}</h2>
  <!--h2 id="pricenum-second" style="color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 20px; font-weight: bold; letter-spacing: -1px; line-height: 1;">
    ${{$property->bidprice}}</h2>-->
  <div class="row">
    <div class="col-md-6 col-sm-12 col-xs-12 no-padding" style="float: left;">
      <!--div class="fotorama" data-nav="thumbs">-->
      <div class="parent-container">
        <?php
          $decodedarr = json_decode( $property->images , true);
          $counter = count($decodedarr);
          $firstimg = $decodedarr[0];
        ?>
        <a href="{{ asset('/../images/') }}/{{$firstimg}}" class="image-link">
          <img class="prop_thumb" src="{{ asset('/../images/') }}/{{$firstimg}}" style="width: 100%; height: 400px; margin-bottom: 2px;" alt="property-images"/>
        </a>
        <div style="text-align:center">
          <div style="display: inline-block">
          <?php
            for ($i = 1 ; $i < $counter; $i++ ){
              $image = $decodedarr[$i];
          ?>
          <!--img class="img-rounded" style="height: 230px; width: 100%" src="{{ asset('/../images/') }}/{{$image}}"/>-->
              <a href="{{ asset('/../images/') }}/{{$image}}" class="image-link">
                <img class="prop_thumb" src="{{ asset('/../images/') }}/{{$image}}" style="width: 50px; height: 50px;" alt="property-images"/>
              </a>
        <?php } ?>
          </div>
        </div>
      </div>
      <!-- PANEL START -->
      <div class ="panel panel-default">
        <div class="panel-title">
          <h4>Property Details</h4>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="panel-heading" style="text-align: center">
              <div style="text-align:center">
                <div style="display:inline-block; margin: 5px;">
                  <div style="font-size: 20px">
                    <i class="fas fa-chart-area"></i>
                    <p>{{$property->area}}sqft&sup2;</p>
                  </div>
                </div>
                <div style="display:inline-block; margin: 5px;">
                  <div style="font-size: 20px">
                    <i class="fas fa-home"></i>
                    <p>{{$property->house_type}}</p>
                  </div>
                </div>
                <div style="display:inline-block; margin: 5px;">
                  <div style="font-size: 20px">
                    <i class="fas fa-bed"></i>
                    <p>{{$property->number_of_beds}} Beds</p>
                  </div>
                </div>
                <div style="display:inline-block; margin: 5px;">
                  <div style="font-size: 20px">
                    <i class="fas fa-bath"></i>
                    <p>{{$property->number_of_baths}} Baths</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-title">
          <h4>Property Description</h4>
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
          <h4>Walkscore</h4>
        </div>
        <div class="panel-heading">
            @include('includes.walkscore')
        </div>
        <div class="panel-title">
          <h4>Listing End Date - {{$property->date}}</h4>
        </div>
        <div class="alert alert-info">
          <i style="font-size: 20px;"class="fa fa-info-circle" aria-hidden="true"></i>
          <p style="margin-top: 5px; margin-left: 2px; display: inline-block">All offers are legitimate and documented</p>
        </div>
        <div data-countdown= "{{$property->date}}" style="text-align: center; font-size: 50px; color: black; margin-bottom: 20px; font-weight: bold">
        </div>
        <?php
          date_default_timezone_set('America/Los_Angeles');
          $date=strtotime($property->date);
          $remaining = $date - time();

          if($remaining < 0){
            $remaining = 0;
          }

         ?>
        <div class="panel-heading" style="text-align:center">
          @if($offers->isEmpty() && $remaining != 0)
            <h3>There are currently no offers provided!</h3>
          @endif
          @foreach($offers as $offer)
              <?php
                $user = DB::table('users')->where('id', $offer->user_id)->first();
                $decodedarr = json_decode( $user->profileimg , true);
                $image = $decodedarr[0];
              ?>
              <h4 id="bidprice"><img src="/images/{{$image}}" width="20px" height="20px"><b> Bid Price: ${{$offer['offerprice']}}</b></h4>
              @if($offer->status == 0)
                <h5><b>Status: Waiting for Approval</b></h5>
              @else
                <h5><b>Status: Approved</b></h5>
              @endif
              @if($remaining == 0 && $offer->status == 1 && $property->user_id == Auth::id())
                 <form action="{{action('PaymentController@create')}}" method="GET">
                   <meta name="csrf-token" content="{{ csrf_token() }}">
                   {{ csrf_field() }}
                   <div class="form-group">
                     <input type="hidden" class="form-control" name="select-email" value="{{$offer->user_id}}">
                   </div>
                   <div class="form-group">
                     <input id="payment-btn" style="width:50%" value="Select" type="submit" name="submit" class="btn btn-primary form-control"></input>
                   </div>
                 </form>
               @endif
               <hr style="width: 200px; border-color:black">
          @endforeach
        </div>
        <div class="panel-title">
          <h4>Open Houses</h4>
        </div>
        <div class="panel-heading">
          <?php
          $firstdatemonth = date("M", strtotime($property->firstdate));
          $firstdateday = date("d", strtotime($property->firstdate));
          $firstdatetime = date('g:h A', strtotime($property->firstdate));
          $secdatemonth = date("M", strtotime($property->seconddate));
          $secdateday = date("d", strtotime($property->seconddate));
          $secdatetime = date('g:h A', strtotime($property->seconddate));
          $thirddatemonth = date("M", strtotime($property->thirddate));
          $thirddateday = date("d", strtotime($property->thirddate));
          $thirddatetime = date('g:h A', strtotime($property->thirddate));
          $fourthdatemonth = date("M", strtotime($property->fourthdate));
          $fourthdateday = date("d", strtotime($property->fourthdate));
          $fourthdatetime = date('g:h A', strtotime($property->fourthdate));
          ?>
          @if($property->firstdate != NULL && $property->seconddate)
            <h3><b>First Date</b></h3>
            <hr>
            <div class="row">
             <div class="col-md-6" style="display: inline-block;">
                <div style="text-align:center">
                  <strong><h4>Start Date</h4></strong>
                  <p style="text-indent: 5px; display:inline-block;" class="calendar">{{$firstdateday}}<em>{{$firstdatemonth}}</em></p>
                  <h3>From: {{$firstdatetime}}</h3>
                </div>
              </div>
              <div class="col-md-6" style="display: inline-block;">
                <div style="text-align:center">
                  <strong><h4>End Date</h4></strong>
                  <p style="text-indent: 5px; display:inline-block;" class="calendar">{{$secdateday}}<em>{{$secdatemonth}}</em></p>
                  <h3>To: {{$secdatetime}}</h3>
                </div>
              </div>
            </div>
            &nbsp;
          @endif
          @if($property->thirddate != NULL && $property->fourthdate)
            <h3><b>Second Date</b></h3>
            <hr>
            <div class="row">
              <div class="col-md-6" style="display: inline-block;">
                <div style="text-align:center">
                  <strong><h4>Start Date</h4></strong>
                  <p style="text-indent: 5px; display:inline-block;" class="calendar">{{$thirddateday}}<em>{{$thirddatemonth}}</em></p>
                  <h3>From: {{$thirddatetime}}</h3>
                </div>
              </div>
              <div class="col-md-6" style="display: inline-block;">
                <div style="text-align:center">
                  <strong><h4>End Date</h4></strong>
                  <p style="text-indent: 5px; display:inline-block;" class="calendar">{{$fourthdateday}}<em>{{$fourthdatemonth}}</em></p>
                  <h3>To: {{$fourthdatetime}}</h3>
                </div>
              </div>
            </div>
          @endif
          @if(($property->firstdate && $property->seconddate) == NULL)
            <h4>No Open-House Dates</h4>
          @endif
        </div>
        <div class="panel-heading">
          <div class="row">
            <h3 style=" color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 20px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;">
              Send Seller a Message</h3>
            <form id="message-form" action="{{ route('messages.store') }}" method="post">
              {{ csrf_field() }}
              <div class="col-xs-12 col-sm-12 col-md-12">
                <!-- Subject Form Input -->
                <div class="form-group">
                  <label class="control-label">Subject</label>
                  <input type="text" class="form-control" name="subject" placeholder="Subject"
                  value="{{ old('subject') }}" required>
                </div>

                <!-- Message Form Input -->
                <div class="form-group">
                  <label class="control-label">Message</label>
                  <textarea name="message" placeholder="Your Message" class="form-control" required>{{ old('message') }}</textarea>
                </div>

                <div class="checkbox">
                  <input type="hidden" name="recipients[]" value="{{ $owner->id }}" checked>
                </div>

                <!-- Submit Form Input -->
                <div class="form-group">
                  <button type="submit" class="btn btn-primary form-control">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="alert alert-info">
          <i style="font-size: 20px;"class="fa fa-info-circle" aria-hidden="true"></i>
          <p style="display: inline; margin-left: 2px;">All offers will be legitimately made, we will email you an electronic document to sign. For more information, please check out our FAQ page <a href="/questions">HERE</a>.</p>
        </div>
        <div class="panel-heading">
          @if($remaining>0)
              <h4 style="color: #111; font-family: 'Helvetica Neue', sans-serif; font-size: 20px; font-weight: bold; letter-spacing: -1px; line-height: 1; text-align: center;">Make an Offer on This Property</h4>
              <form id="offer-property" action="{{action('OfferController@store')}}" method="post" enctype="multipart/form-data">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                {{ csrf_field() }}
                <input type="hidden" name="prop_id" value="{{$property->id}}">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                          <b>Name:</b>
                          <input type="text" name="name" placeholder="Your Name" class="form-control input-lg" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                          <b>Offer Amount:</b>
                          <input type="text" name="offerprice" placeholder="Enter the dollar amount of your offer for this property" class="form-control input-lg" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                          <textarea rows="5" cols="5" name="comments" placeholder="Additional Comments or Notes" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                      <button type="submit" class="btn btn-primary form-control">Submit</button>
                    </div>
                </div>
              </form>
            @else
              <h4 style="text-align: center; font-size: 50px; color: black; margin-bottom: 20px; font-weight: bold;">Offer Period is Over</h4>
            @endif
          </div>
      </div>
      <!-- PANEL END-->
      <!-- COL END -->
    </div>
    <!-- Widget START -->
    <div class="col-md-5 col-sm-12 col-xs-12 no-padding" style="margin: 20px width: 100%; float:right">
        <input id="showmaplat" type="hidden" value="{{$property->latitude}}">
        <input id="showmaplong" type="hidden" value="{{$property->longitude}}">
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
        &nbsp;
    </div>
    <div class="col-md-5 col-sm-12 col-xs-12" style="float:right">
      <div class="container requestform">
        <form id="request-time" method="post" action="{{ route('bookings.store') }}" enctype="multipart/form-data">
          <meta name="csrf-token" content="{{ csrf_token() }}">
          {{ csrf_field() }}
          <input type="hidden" name="prop_id" value="{{$property->id}}">
            <div class="form-group">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <h3>Request a Viewing Time</h3>
                <strong>Name</strong>
                  @if(Auth::check())
                    <input name="name" class="form-control" value="{{Auth::user()->name}}" required></input>
                  @else
                    <input name="name" class="form-control" required></input>
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
                  <textarea rows="5" cols="5" name="description" placeholder="Description" class="form-control" required></textarea>
                </div>
              </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <div class='input-group date' id='openfirst'>
                      <input type="text" name="openfirst" placeholder="Start Date" class="form-control" required readonly="readonly">
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                  <div class='input-group date' id='opensecond'>
                      <input type="text" name="opensecond" placeholder="End Date" class="form-control" required readonly="readonly">
                      <span class="input-group-addon">
                          <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                  </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" style="text-align: right">
              <button type="submit" class="btn btn-primary form-control">Submit</button>
            </div>
        </form>
      </div>
      &nbsp;
      <!--div><h2 style="font-family:stagsans,arial,helvetica,sans-serif;font-size:1.6em;font-weight:400;margin-top:0"><a href="/best-mortgage-rates" style="text-decoration:none;color:#A3C139;">Mortgage rate comparison</a></h2><div class="widget" data-widget="mtg-table" data-home_price="{{$property->price}}"data-purchase="true" data-lang="en"></div><div style="text-align:right;">  <a href="https://www.ratehub.ca/" style="display:inline-block;width:80px;margin-top:.5em;margin-top:-1em"><img src="https://www.ratehub.ca/assets/images/widget-logo.png" style="width:100%;" alt="RateHub logo">
      </a></div>
    </div-->
      <div id="fb-widget" style="text-align:center">
        <div style="display: inline-block">
          <div class="fb-page" data-href="https://www.facebook.com/realsuuty/" data-tabs="messages, timeline, events" data-width="320" data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/realsuuty/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/realsuuty/">Suuty</a></blockquote>
          </div>
        </div>
      </div>
      &nbsp;
      <div style="text-align:center">
        <div style="display: inline-block">
          <div><h2 style="font-family:stagsans,arial,helvetica,sans-serif;font-size:1.6em;font-weight:400;margin-top:0"><a href="/best-mortgage-rates" style="text-decoration:none;color:#A3C139;">Mortgage rate comparison</a></h2><div class="widget" data-widget="mtg-table" data-home_price="{{$property->price}}" data-purchase="true" data-lang="en"></div><div style="text-align:right;">  <a href="https://www.ratehub.ca/" style="display:inline-block;width:80px;margin-top:.5em;margin-top:-1em"><img src="https://www.ratehub.ca/assets/images/widget-logo.png" style="width:100%; opacity: initial !important" alt="RateHub logo">
          </a></div>
          </div>
        </div>
      </div>
      &nbsp;
    </div>
     <!-- Widget END -->
  </div>
  <!-- ROW END -->
</div>

<section class="splash-section">
  <?php
  $link = $_SERVER['PHP_SELF'];
  $link_array = explode('/',$link);
  $currslug = end($link_array);
  //$nospace = $property->street_address . $property->route;

  $searchprop = DB::table('properties')->where(function ($q) use ($property) {
    $q->where('city', 'LIKE', "%{$property->city}%")
    ->orwhere('route', 'LIKE', "{$property->route}")
    ->orwhere('postal_code', 'LIKE', "{$property->postal_code}")
    ->where('state', 'LIKE', "%{$property->state}%")
    ->where('country', 'LIKE', "%{$property->country}%");
  })->where('id', '!=', "$property->id")->paginate(4);
  ?>
  <div id="footer-media" class="splash-inner-media"></div>
    <div class="splash-inner-content" style="height: 500px">
      <div class="container">
        <div class="splash-title">
          <p style="text-align: left; font-size: 50px; color: white; font-weight: bold">Similar Properties</p>
          <!--p style="text-align: center; font-size: 25px; color: white">Welcome to the New Home of Real Estate</p>-->
        </div>
        <div id="similar-prop" class="col-xs-2 col-sm-2 col-md-2" style="float:right;">
          <div>
            @foreach($searchprop as $property)
              <p style="overflow: hidden; text-overflow: ellipsis; font-weight: bold; font-size: 25px; top: 20px">
                <a href="{{ url('properties')}}/{{$property->slug}}">{{$property->slug}}</a>
              </p>
            @endforeach
          </div>
        </div>
        @if($searchprop->isEmpty())
          <h3 id="no-proplisted" style="color:white">There are currently no similar properties listed!</h3>
        @endif
      </div>
    </div>
</section>
@endsection

@section('footer')
@include('includes.footer')
@endsection
