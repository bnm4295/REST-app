<?php
if(isset($_GET['addr'])){
  $search = $_GET['addr'];
}
else{$search = "";}

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
}else{$price_left="nopriceleft";}

if(isset($_GET['price_right'])){
  $price_right = $_GET['price_right'];
}else{$price_right="nopriceright";}

if(isset($_GET['area_left'])){
  $area_left = $_GET['area_left'];
}else{$area_left="noarealeft";}

if(isset($_GET['area_right'])){
  $area_right = $_GET['area_right'];
}else{$area_right="noarearight";}

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
      if(empty($savesearch)){
      ?>
        <div class="alert alert-danger" style="z-index: 2; text-align:center; position: absolute; width: 100%">ERROR</div>
      <?php
      }
      else{
      ?>
        <div class="alert alert-success"  style="z-index: 2; text-align:center; position: absolute; width: 100%">Success</div>
      <?php
      }
    }
    else{
      ?>

      <?php
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
&& ($area_left == "noarealeft" && $area_right == "noarearight") && $numbeds == "" && $numbaths == ""
   && $proptype == ""){

    $searchprop = DB::table('properties')->where(function ($q) use ($search) {
      foreach ($search as $value) {
        $q->where('city', 'LIKE', "%{$value}%")
          ->orwhere(DB::raw('CONCAT_WS(" ", street_address, route)'), 'LIKE', "%{$value}%")
          ->orwhere('postal_code', 'LIKE', "%{$value}%")
          ->where('state', 'LIKE', "%{$value}%")
          ->where('country', 'LIKE', "%{$value}%");
      }
    })->paginate(4);
    //dd($searchprop);
    //$searchprop = DB::table('properties')
    //->where(function($query) use ($search){
    //    $query->where('city', 'LIKE', "%".escape_like($search)."%")
    //          ->orwhere('route', 'LIKE', "%$search%")
    //          ->orwhere('state', 'LIKE', "%$search%")
    //          ->orwhere('postal_code', 'LIKE', "%$search%")
    //          ->orwhere('country', 'LIKE', "%$search%");
    //})->get();
}
elseif($search[0] == "" && $numbeds != "" && $numbaths != "" && $proptype != ""){
  $searchprop = DB::table('properties')->where('number_of_beds', 'LIKE', "%$numbeds%")
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
  ->paginate(4);
}
else{
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
  ->paginate(4);
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

?>
<section class="properties endless-pagination" data-next-page="{{ $searchprop->nextPageUrl() }}">
<?php
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
          <a style="color: black" href="{{ url('properties')}}/{{$post->slug}}">
            <h3 class="add-ellipsis"><strong>{{$post->title}}</strong></h3>
            <h4><strong>${{$post->price}}</strong></h4>
          </a>
          <hr>
          <p><i class="fas fa-bed"></i><b> {{$post->number_of_beds}}</b> | <i class="fas fa-bath"></i><b> {{$post->number_of_baths}} </b></p>
          <p><i class="fas fa-chart-area"></i><b> {{$post->area}}sqft&sup2;</b></p>
          <p class="add-ellipsis"><strong>
            {{$post->street_address}}
            {{$post->route}}
            {{$post->city}}
            {{$post->state}}
          </strong></p>
        </div>
      </div>
    </div>
</div>
<?php } ?>
<div class="col-md-12" style="text-align:center">
  <div style="display: inline-block">
    <div>{!! $searchprop->appends(Request::except('page'))->render() !!}</div>
  </div>
</div>
</section>
