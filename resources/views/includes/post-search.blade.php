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

//Search on Listings
if(isset($_GET['area_right']) || isset($_GET['area_left']) || isset($_GET['price_left']) || isset($_GET['price_right']) )
{
    //update later ADV SEARCH
    $search = $_GET['addr'];
    $numbeds = $_GET['number_of_beds'];
    $numbaths = $_GET['number_of_baths'];
    $proptype = $_GET['house_type'];

    //area & price
    $area_right = $_GET['area_right'];
    $area_left = $_GET['area_left'];
    $price_right = $_GET['price_right'];
    $price_left = $_GET['price_left'];

    //Cron event for emailing

    //cron event ends
    if($_GET['addr'] == ""){
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
      //for ($i = 0 ; $i < $counter; $i++ ){
      $decodedarr = json_decode( $post->images , true);
      $counter = count($decodedarr);
      //$image = $decodedarr[$i];
      $image = $decodedarr[0];
      //echo $decodedarr[$i];
      ?>
      <div class="col-lg-6 text-center">
        <div class ="panel panel-default">
          <a id="{{$post->id}}" href="{{ url('properties')}}/{{$post->slug}}"><input class="img-rounded" value="" type="submit" style="border: solid 0px #000000; height: 200px; width: 100%;
            background-image: url({{ asset('/../images/') }}/{{$image}});
            background-size: 450px; background-repeat: no-repeat;"/></a>
          <div class="panel-heading">
            <div style="text-align: left;">
              <h3><strong>{{$post->title}}</strong></h3>
              <strong>${{$post->price}}</strong>
              <hr>
              <strong>Number of Beds: {{$post->number_of_beds}} </strong>
              <br>
              <strong>Number of Baths: {{$post->number_of_baths}} </strong>
              <br>
              <strong>Sqft: {{$post->area}}</strong>
              <br>
              <strong>
                {{$post->street_address}}
                {{$post->route}}
                {{$post->city}}
                {{$post->state}}
              </strong>
            </div>
          </div>
        </div>
      </div>
<?php } }

//Homepage search
else{
  //update later ADV SEARCH
  $search = $_GET['addr'];
  $numbeds = $_GET['number_of_beds'];
  $numbaths = $_GET['number_of_baths'];
  $proptype = $_GET['house_type'];

  //Cron event for emailing

  //cron event ends
  if($_GET['addr'] == ""){
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
             ->get();
  }
  foreach($searchprop as $post){
    //for ($i = 0 ; $i < $counter; $i++ ){
    $decodedarr = json_decode( $post->images , true);
    $counter = count($decodedarr);
    //$image = $decodedarr[$i];
    $image = $decodedarr[0];
    //echo $decodedarr[$i];
    ?>
    <div class="col-lg-6 text-center">
      <div class ="panel panel-default">
        <a id="{{$post->id}}" href="{{ url('properties')}}/{{$post->slug}}"><input class="img-rounded" value="" type="submit" style="border: solid 0px #000000; height: 200px; width: 100%;
          background-image: url({{ asset('/../images/') }}/{{$image}});
          background-size: 450px; background-repeat: no-repeat;"/></a>
        <div class="panel-heading">
          <div style="text-align: left;">
            <h3><strong>{{$post->title}}</strong></h3>
            <strong>${{$post->price}}</strong>
            <hr>
            <strong>Number of Beds: {{$post->number_of_beds}} </strong>
            <br>
            <strong>Number of Baths: {{$post->number_of_baths}} </strong>
            <br>
            <strong>Sqft: {{$post->area}}</strong>
            <br>
            <strong>
              {{$post->street_address}}
              {{$post->route}}
              {{$post->city}}
              {{$post->state}}
            </strong>
          </div>
        </div>
      </div>
    </div>
<?php } } ?>
