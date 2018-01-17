@extends('layouts.app')

@section('content')

@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif
<div class="container-fluid">
  <div id="listings-row" class="row">
    <div class="col-md-6 col-sm-6 col-xs-12 no-padding">
        <div id="locationField">
          <div id="moveloc">
            <input class="form-control" id="autocomplete" placeholder="Enter your address"
            onFocus="geolocate()" type="text"></input>
          </div>
        </div>
        <div id='map' style="position: absolute; top: 0; right: 0; left: 0; bottom: 0;"></div>
        <div id="infowindow-content">
          <img src="" width="16" height="16" id="place-icon">
          <span id="place-name"  class="title"></span><br>
          <span id="place-address"></span>
        </div>
    </div>
    <div class="col-md-6 col-sm-6 col-xs-12 no-padding">
      <div id="property-listings">
        @include('includes.advsearch')
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
          if(Auth::check()){
            $mempar = $_GET['mempar'];
            $email = Auth::user()->email;
            $id = Auth::id();
            $today = date("Y-m-d H:i:s");
            $linkurl = $_SERVER['REQUEST_URI'];
            $checkURL = DB::table('savesearch')->selectRaw('url')->where('url', '=', $linkurl)->get();
            //echo $checkURL;
            if($checkURL == '[]')
            {
              $savesearch = DB::table('savesearch')->insertGetId(
                ['email' => $email, 'user_id' => $id, 'url' => $linkurl, 'created_at' => $today, 'updated_at' => $today]
              );
            }
            //echo $mempar;
          }
        }
        if(isset($_GET['addr']))
        {
           //update later ADV SEARCH
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
            if(isset($_GET['house_type']) && $_GET['house_type'] != "" && $_GET['addr'] == ""){
              //echo "made it";
              $searchprop = DB::table('properties')
                       ->where('house_type', 'LIKE' , "%$proptype%")
                       //->where('city', 'LIKE', "%$search%")
                       //->orwhere('route', 'LIKE', "%$search%")
                       //->where('state', 'LIKE', "%$search%")
                       //->where('postal_code', 'LIKE', "%$search%")
                       //->where('country', 'LIKE', "%$search%")
                       ->where('number_of_beds', 'LIKE', "%$numbeds%")
                       ->where('number_of_baths', 'LIKE', "%$numbaths%")
                       ->where([
                         ['price', '>=', $price_left],
                         ['price', '<=', $price_right ]
                        ])
                       ->where([
                         ['area', '>=', $area_left],
                         ['area', '<=', $area_right ]
                        ])
                       //->where([
                        // ['area', '>=', $area_left],
                        // ['area', '<=', $area_right ]
                        //])
                       ->get();
            }
            else{
              //echo "rip";
              $searchprop = DB::table('properties')
                       ->where('house_type', 'LIKE' , "%$proptype%")
                       ->where('city', 'LIKE', "%$search%")
                       ->orwhere('route', 'LIKE', "%$search%")
                       ->orwhere('state', 'LIKE', "%$search%")
                       ->orwhere('postal_code', 'LIKE', "%$search%")
                       ->orwhere('country', 'LIKE', "%$search%")
                       ->where('number_of_beds', 'LIKE', "%$numbeds%")
                       ->where('number_of_baths', 'LIKE', "%$numbaths%")
                       ->where([
                         ['price', '>=', $price_left],
                         ['price', '<=', $price_right ]
                        ])
                       ->where([
                         ['area', '>=', $area_left],
                         ['area', '<=', $area_right ]
                        ])
                       ->get();
            }
            foreach($searchprop as $post){
              ?>
              <div class="col-lg-6 text-center">
                <div class ="panel panel-default">
                  <div class="panel-heading">
              <?php
              echo $post->id;
              echo "<br>";
              echo $post->title;
              echo "<br>";
              echo $post->house_type;
              echo "<br>";
              $decodedarr = json_decode( $post->images , true);
              $counter = count($decodedarr);
              //$image = $decodedarr[$i];
              $image = $decodedarr[0];
              ?>
              <a href="{{ url('properties')}}/{{$post->slug}}"><input class="img-rounded" value="" type="submit" style="border: solid 0px #000000; height: 200px; width: 60%;
               background-image: url({{ asset('/../images/') }}/{{$image}});
                background-size: 300px; background-repeat: no-repeat;"/></a>
              </div>
            </div>
          </div>
        <?php } } else { ?>
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
                      <!--form action="{{action('PropertyController@show', $post->slug)}}" method="get">
                        <input name="_method" type="hidden" value="show">
                        <input name="title" type="hidden" value="">
                        <img class="img-rounded" style="height: 230px; width: 100%" src="{{ asset('/../images/') }}/{{$image}}"/>
                        <button class="btn btn-success" type="submit">Show</button>
                      </form>-->
                      <a href="{{ url('properties')}}/{{$post->slug}}"><input class="img-rounded" value="" type="submit" style="border: solid 0px #000000; height: 200px; width: 60%;
                       background-image: url({{ asset('/../images/') }}/{{$image}});
                        background-size: 300px; background-repeat: no-repeat;"/></a>

                      @if (Auth::id() == $post['user_id'] || (Auth::guard('admin')->check() == true ))
                        <form action="{{action('PropertyController@edit', $post['id'])}}" method="get">
                          {{csrf_field()}}
                          <input type="hidden" name="_method" value="EDIT">
                          <button class="btn btn-success" type="submit">Edit</button>
                        </form>

                        <form action="{{action('PropertyController@destroy', $post['id'] )}}" method="post">
                          {{csrf_field()}}
                          <input type="hidden" name="_method" value="DELETE">
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
</div>
@endsection
