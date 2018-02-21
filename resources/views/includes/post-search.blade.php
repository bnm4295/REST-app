<?php
if(isset($_GET['addr'])){
  $search = $_GET['addr'];
}

//baths&beds
if(isset($_GET['number_of_beds'])){
  $numbeds = $_GET['number_of_beds'];
}else{$numbeds="";}
if(isset($_GET['number_of_baths'])){
  $numbaths = $_GET['number_of_baths'];
}else{$numbaths="";}

//house type
if(isset($_GET['house_type'])){
  $proptype = $_GET['house_type'];
}else{$proptype = "";}

//area & price
if(isset($_GET['price_left'])){
  $price_left = $_GET['price_left'];
  if($price_left == 0){
    $price_left="nopriceleft";
  }
}
if(isset($_GET['price_right'])){
  $price_right = $_GET['price_right'];
  if($price_right == 0){
    $price_right="nopriceright";
  }
}
if(isset($_GET['area_left'])){
  $area_left = $_GET['area_left'];
  if($area_left==0){
    $area_left="noarealeft";
  }
}
if(isset($_GET['area_right'])){
  $area_right = $_GET['area_right'];
  if($area_right==0){
    $area_right="noarearight";
  }
}

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
        ['email' => $email, 'user_id' => $id, 'url' => $linkurl,
          'price_left' => $price_left, 'price_right' => $price_right, 'area_left' => $area_left, 'area_right' => $area_right,
          'addr' => $search, 'number_of_beds' => (int)$numbeds, 'number_of_baths' => (int)$numbaths, 'house_type' => $proptype, 'created_at' => $today, 'updated_at' => $today,
         ]
      );
    }
    //echo $mempar;
  }
}

//$search = explode(',',$search);
//$data = array_map('intval', $search);
//dd($data);

/**
* @param $string
* @return mixed
*/
if (! function_exists('escape_like')) {
  function escape_like($string)
  {
      $search = array(' ', '_');
      $replace   = array('', '\_');
      return str_replace($search, $replace, $string);
  }

}
//$string = "1030 dkqowdk";
//$string = escape_like($string);
//$esc_commas = escape_like($search);
$search = array_map('trim', explode(',', $search));

//$search = preg_split('/\s+/', $esc_commas, -1, PREG_SPLIT_NO_EMPTY);
//dd($test);
//dd($teststuff);
//$testprop = DB::table('properties')->where(DB::raw('CONCAT_WS(" ", street_address, route)'), 'LIKE', "%1055 Canada Place%")->get();
//dd($testprop);
//Search on Listings

//addr

//Homepage Adv Search
if($price_left == "nopriceleft" && $price_right == "nopriceright"
|| $area_left == "noarealeft" && $area_right == "noarearight" && $numbeds == "" && $numbaths == ""
   && $proptype == "" ){

    $searchprop = DB::table('properties')->where(function ($q) use ($search) {
      foreach ($search as $value) {
        $q->where('city', 'LIKE', "%{$value}%")
          ->orwhere(DB::raw('CONCAT_WS(" ", street_address, route)'), 'LIKE', "%{$value}%")
          ->orwhere('postal_code', 'LIKE', "%{$value}%")
          ->where('state', 'LIKE', "%{$value}%")
          ->where('country', 'LIKE', "%{$value}%");
      }
    })->get();
    //dd($searchprop);
    //dd($testprop);
    //$searchprop = DB::table('properties')
    //->where(function($query) use ($search){
    //    $query->where('city', 'LIKE', "%".escape_like($search)."%")
    //          ->orwhere('route', 'LIKE', "%$search%")
    //          ->orwhere('state', 'LIKE', "%$search%")
    //          ->orwhere('postal_code', 'LIKE', "%$search%")
    //          ->orwhere('country', 'LIKE', "%$search%");
    //})->get();
}else{
  $searchprop = DB::table('properties')->where(function ($q) use ($search) {
    foreach ($search as $value) {
      $q->where('city', 'LIKE', "%{$value}%")
        ->orwhere(DB::raw('CONCAT_WS(" ", street_address, route)'), 'LIKE', "%{$value}%")
        ->orwhere('postal_code', 'LIKE', "%{$value}%")
        ->where('state', 'LIKE', "%{$value}%")
        ->where('country', 'LIKE', "%{$value}%");
    }
  })->where('number_of_beds', 'LIKE', "%$numbeds%")
  ->where('number_of_baths', 'LIKE', "%$numbaths%")
  ->where('house_type', 'LIKE' , "%$proptype%")
  ->where([
     ['price', '>=', (int)$price_left],
     ['price', '<=', (int)$price_right ]
   ])
   ->where([
     ['area', '>=', (int)$area_left],
     ['area', '<=', (int)$area_right ]
   ])
  ->get();
}

/*  ->where([
    ['price', '>=', $price_left],
    ['price', '<=', $price_right ]
  ])
  ->where([
    ['area', '>=', $area_left],
    ['area', '<=', $area_right ]
  ])
  */

           //dd($search);
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
      <a id="{{$post->id}}" href="{{ url('properties')}}/{{$post->slug}}"><img src="{{ asset('/../images/') }}/{{$image}}" style="border: solid 0px #000000; height: 200px; width: 100%;
        background-size: 350px; background-repeat: no-repeat;"></a>
      <div class="panel-heading">
        <div style="text-align: left;">
          <h3 class="proptitle"><strong>{{$post->title}}</strong></h3>
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
<?php } ?>
