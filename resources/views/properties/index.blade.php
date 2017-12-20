@extends('layouts.app')
<?php
?>
@section('content')

@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
<div class="container-fluid">
  <div class="row">
    <div id="map-screen-fix">
        <div id="locationField">
          <div id="moveloc">
            <input class="form-control" id="autocomplete" placeholder="Enter your address"
            onFocus="geolocate()" type="text"></input>
          </div>
        </div>
        <div id='map' style="width: 500px;"></div>
        <div id="infowindow-content">
          <img src="" width="16" height="16" id="place-icon">
          <span id="place-name"  class="title"></span><br>
          <span id="place-address"></span>
        </div>
    </div>
    <div id="property-listings" class="col-md-6 col-sm-6 col-xs-12 no-padding">
        <div class="col-md-10 col-md-offset-0">
          <h2>Property Listings</h2>
          <!-- <a href="{{ asset('/../server.php/properties/create') }}" >Create New Listing</a> -->
        </div>
        @if($properties->isEmpty())
        <div class="col-md-10 col-md-offset-1">
          <h1>There is no item listed!</h1>
        </div>
        @endif
        <?php
        if(isset($_GET['mempar'])){
          $mempar = $_GET['mempar'];
          $email = Auth::user()->email;
          $id = Auth::id();
          $today = date("Y-m-d H:i:s");
          $linkurl = $_SERVER['REQUEST_URI'];
          $savesearch = DB::table('savesearch')->insertGetId(
            ['email' => $email, 'user_id' => $id, 'url' => $linkurl, 'created_at' => $today, 'updated_at' => $today]
          );
          echo $mempar;
        }
        if(isset($_GET['addr']) &&
           isset($_GET['number_of_beds']) &&
           isset($_GET['number_of_baths']) &&
           isset($_GET['house_type']))
        {
           //update later ADV SEARCH
          ?>
          <div class="col-lg-6 text-center">
            <div class ="panel panel-default">
              <div class="panel-heading">
          <?php
            $search = $_GET['addr'];
            $numbeds = $_GET['number_of_beds'];
            $numbaths = $_GET['number_of_baths'];
            $proptype = $_GET['house_type'];
            $area_right = $_GET['area_right'];
            $area_left = $_GET['area_left'];
            $price_right = $_GET['price_right'];
            $price_left = $_GET['price_left'];

            //Cron event for emailing

            //cron event ends

            $searchprop = DB::table('properties')
                     ->where('city', 'LIKE', $search)
                     ->orwhere('route', 'LIKE', $search)
                     ->orwhere('state', 'LIKE', $search)
                     ->orwhere('postal_code', 'LIKE', $search)
                     ->orwhere('country', 'LIKE', $search)
                     ->orwhere('number_of_beds', '=', $numbeds)
                     ->orwhere('number_of_baths', '=', $numbaths)
                     ->orwhere('house_type', '=' , $proptype)
                     ->orwhere([
                       ['price', '>=', $price_left],
                       ['price', '<=', $price_right ]
                      ])
                     ->orwhere([
                       ['area', '>=', $area_left],
                       ['area', '<=', $area_right ]
                      ])
                     ->get();
            foreach($searchprop as $post){
              echo $post->id;
              echo $post->house_type;
              echo "<br>";
            }
          ?>
              </div>
            </div>
          </div>
          <?php
          }
          else{
          ?>
        @foreach($properties as $post)

        <div class="col-lg-6 text-center">
                <div class ="panel panel-default">
                  <div class="panel-heading">
                    <strong>ID : {{$post['id']}}</strong>
                      <strong>Title: {{$post['title']}}</strong>
                      <hr>
                      <strong>Number of Beds: {{$post['number_of_beds']}} </strong>
                      <br>
                      <strong>Number of Baths: {{$post['number_of_baths']}} </strong>
                      <br>
                      <?php
                        //for ($i = 0 ; $i < $counter; $i++ ){
                        $decodedarr = json_decode( $post['images'] , true);
                        $counter = count($decodedarr);
                        //$image = $decodedarr[$i];
                        $image = $decodedarr[0];
                        //echo $decodedarr[$i];
                      ?>
                      <!--?php //} ?-->
                      <br>
                      <form action="{{action('PropertyController@show', $post['id'])}}" method="get">
                        <!--input name="_method" type="hidden" value="show">-->
                        <input name="title" type="hidden" value="{{$post['title']}}">
                        <input class="img-rounded" value="" type="submit" style="border: solid 0px #000000; height: 200px; width: 60%;
                         background-image: url({{ asset('/../public/images/') }}/{{$image}});
                          background-size: 300px; background-repeat: no-repeat;"/>
                        <!--img class="img-rounded" style="height: 230px; width: 100%" src="{{ asset('/../public/images/') }}/{{$image}}"/>
                        <button class="btn btn-success" type="submit">Show</button>-->
                      </form>

                      @if (Auth::id() == $post['user_id'] || (Auth::guard('admin')->check() == true ))
                        <form action="{{action('PropertyController@edit', $post['id'])}}" method="get">
                          {{csrf_field()}}
                          <input name="_method" type="hidden" value="edit">
                          <button class="btn btn-success" type="submit">Edit</button>
                        </form>

                        <form action="{{action('PropertyController@destroy', $post['id'])}}" method="post">
                          {{csrf_field()}}
                          <input name="_method" type="hidden" value="delete">
                          <button class="btn btn-danger" type="submit" onclick="return confirm('Do you really want to delete this property?')">
                            Delete
                          </button>
                        </form>
                      @endif
                  </div>
                </div>
              </div>
      @endforeach
      <?php } ?>
    </div>
  </div>
</div>
@endsection
