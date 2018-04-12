@extends('layouts.app')

@section('content')
@if (session('alert'))
    <div class="alert alert-success" style="z-index: 1; text-align:center; position: absolute; width: 100%">
        <h3>{{ session('alert') }}</h3>
    </div>
@endif

<?php
/*
use Coinbase\Wallet\Client;
use Coinbase\Wallet\Configuration;
$api_key = 'ed43fccd9f69d28e5efa45b07df1c40a4c8e0e6277266e654b42aa0786069558';
$coinbase = new Coinbase($api_key);
$orders = $coinbase->getOrders();
/*
   
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://www.coinbase.com/oauth/authorize?client_id=ed43fccd9f69d28e5efa45b07df1c40a4c8e0e6277266e654b42aa0786069558&meta%5Bsend_limit_amount%5D=1.00&meta%5Bsend_limit_currency%5D=USD&redirect_uri=https%3A%2F%2Fwww.suuty.com&response_type=code&scope=wallet%3Atransactions%3Asend&state=SECURE_RANDOM",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_ENCODING => "",
    CURLOPT_TIMEOUT => 30000,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        // Set Here Your Requesred Headers
        'Content-Type: application/json',
    ),
));

$response = curl_exec($curl);

//$response = json_decode($response);

//dd($response);
*/

$request = '{
  "grant_type" : "authorization_code", 
  "code" : "430064190bd2c57ef78a5e3c4288573d7a0e282be66e6bc79c6e79503082af23",
  "client_id" : "ed43fccd9f69d28e5efa45b07df1c40a4c8e0e6277266e654b42aa0786069558",
  "client_secret" : "bc143defff0d547a53a83f86c6cfce059482f4767e4a1e75b41b8149297f1d47",
  "redirect_uri" : "https://www.suuty.com"
}';

$post_fields = json_decode($request, true); //convert json string to an object
$post_fields = http_build_query($post_fields); //urlencode for arrays

$curl = curl_init();
 curl_setopt($curl, CURLOPT_POST, true); //tell curl that were posting some data along with the request 
 curl_setopt($curl, CURLOPT_POSTFIELDS, $post_fields); //the data that we want to post
 curl_setopt($curl, CURLOPT_URL, 'https://api.coinbase.com/oauth/token'); //the request url

 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //return the transfer, by default its being echoed out
$response = curl_exec($curl); //execute the request
$response = json_decode($response, true);

var_dump( $response );


$request = '{
  "grant_type" : "refresh_token", 
  "client_id" : "ed43fccd9f69d28e5efa45b07df1c40a4c8e0e6277266e654b42aa0786069558",
  "client_secret" : "bc143defff0d547a53a83f86c6cfce059482f4767e4a1e75b41b8149297f1d47",
  "refresh_token" : "cfa8da03fc6f54959ea2933590fd6592f09ac3fbf29364a17b6a02b92ac34de3"
}';
//dd($request);
$post_fields = json_decode($request, true); //convert json string to an object
$post_fields = http_build_query($post_fields); //urlencode for arrays

$curl = curl_init();
curl_setopt($curl, CURLOPT_POST, true); //tell curl that were posting some data along with the request 
curl_setopt($curl, CURLOPT_POSTFIELDS, $post_fields); //the data that we want to post
curl_setopt($curl, CURLOPT_URL, 'https://api.coinbase.com/oauth/token'); //the request url

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true); //return the transfer, by default its being echoed out
$response = curl_exec($curl); //execute the request
$response = json_decode($response, true);
var_dump($response);
echo $response['access_token'];
//echo $response[0]['access_token'];


?>

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
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">You are logged in as ADMIN!</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                      <h3 style="text-align: center">Property Offers</h3>
                    </div>
                    <section class="offers endless-pagination" data-next-page="{{ $offers->nextPageUrl() }}">
                      @foreach($offers as $offer)
                        <strong>PropertyID: {{$offer['prop_id']}} | UserID: {{$offer['user_id']}} | Status: {{$offer['status']}}
                        <br>
                        Name: {{$offer['name']}} | Price: ${{$offer['offerprice']}}
                        <br>
                        Comments: {{$offer['comments']}}</strong>
                        <form method="post" action="{{ action('OfferController@update', $offer['id'] )}}" enctype="multipart/form-data">
                          {{csrf_field()}}
                          <input name="_method" type="hidden" value="PATCH">
                          <input type="hidden" name="status" class="form-control input-lg" value="1">
                          <input type="hidden" name="name" class="form-control input-lg" value="{{$offer->name}}">
                          <input type="hidden" name="offerprice" class="form-control input-lg" value="{{$offer->offerprice}}">
                          <input type="hidden" name="comments" class="form-control input-lg" value="{{$offer->comments}}">
                          <button class="btn btn-success approvebtn" type="submit">Approve</button>
                        </form>

                        <form method="post" action="{{ action('OfferController@update', $offer['id'] )}}" enctype="multipart/form-data">
                          {{csrf_field()}}
                          <input name="_method" type="hidden" value="PATCH">
                          <input type="hidden" name="status" class="form-control input-lg" value="0">
                          <input type="hidden" name="name" class="form-control input-lg" value="{{$offer->name}}">
                          <input type="hidden" name="offerprice" class="form-control input-lg" value="{{$offer->offerprice}}">
                          <input type="hidden" name="comments" class="form-control input-lg" value="{{$offer->comments}}">
                          <button class="btn btn-success disapprovebtn" type="submit">Status Off</button>
                        </form>

                        <form id="delete-offer" action="{{action('OfferController@destroy', $offer['id'])}}" method="post">
                          {{csrf_field()}}
                          <input name="_method" type="hidden" value="delete">
                          <button class="btn btn-danger" type="submit" onclick="return confirm('Do you really want to delete this offer?')">
                            Delete
                          </button>
                        </form>
                      @endforeach
                      <div class="col-md-12" style="text-align:center">
                        <div style="display: inline-block">
                          <div>{!! $offers->render() !!}</div>
                        </div>
                      </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
    <h3 style="font-family: 'Helvetica Neue', sans-serif; font-size: 30px; font-weight: bold; letter-spacing: -1px; text-indent: 15px;">Blogs</h3>
    <hr>
    <h3 style="text-align: center;"><a href="{{ asset('/../blogs/create') }}" >Create a Blog</a></h3>

    @foreach($blogs as $blog)
      <div class="col-md-4 text-center">
        <h3>{{$blog->title}}</h3>
        <div class ="panel panel-default">

            @if($blog['images'] != "")
                <?php
                  $decodedarr = json_decode( $blog->images , true);
                  $counter = count($decodedarr);
                  //$image = $decodedarr[$i];
                  $image = $decodedarr[0];
                ?>

             <a href="{{ url('blogs')}}/{{$blog->slug}}"><img src="{{ asset('/../images/') }}/{{$image}}" style="border: solid 0px #000000; height: 200px; width: 100%;
               background-size: 375px; background-repeat: no-repeat;">
             </a>
            @endif

            <form id="delete-blog" action="{{action('BlogController@destroy', $blog['id'])}}" method="post">
              {{csrf_field()}}
              <input name="_method" type="hidden" value="delete">
              <button class="btn btn-danger" type="submit" onclick="return confirm('Do you really want to delete this blog?')">
                Delete
              </button>
            </form>
            <form action="{{action('BlogController@edit', $blog['id'])}}" method="get">
              {{csrf_field()}}
              <input type="hidden" name="_method" value="EDIT">
              <button class="btn btn-success" type="submit">Edit</button>
            </form>
          </div>
        </div>
      @endforeach
</div>

<section class="properties endless-pagination" data-next-page="{{ $properties->nextPageUrl() }}">
<div class="container">
    <h3 style="font-family: 'Helvetica Neue', sans-serif; font-size: 30px; font-weight: bold; letter-spacing: -1px; text-indent: 15px;">Featured Listings</h3>
    <hr>
    @foreach($properties as $post)
    <?php
    //for ($i = 0 ; $i < $counter; $i++ ){
    $decodedarr = json_decode( $post['images'] , true);
    $counter = count($decodedarr);
    //$image = $decodedarr[$i];
    $image = $decodedarr[0];
    //echo $decodedarr[$i];
    ?>

    <div class="col-lg-6 text-center">
            <div class ="panel panel-default">
                <a id="{{$post->id}}" href="{{ url('properties')}}/{{$post->slug}}"><img src="{{ asset('/../images/') }}/{{$image}}" style="border: solid 0px #000000; height: 200px; width: 100%;
                  background-size: 450px; background-repeat: no-repeat;"></a>
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
                  <!--form action="{{action('PropertyController@show', $post->slug)}}" method="get">
                    <input name="_method" type="hidden" value="show">
                    <input name="title" type="hidden" value="">
                    <img class="img-rounded" style="height: 230px; width: 100%" src="{{ asset('/../images/') }}/{{$image}}"/>
                    <button class="btn btn-success" type="submit">Show</button>
                  </form>-->

                  @if ((Auth::guard('admin')->check() == true ))
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
  <div class="col-md-12" style="text-align:center">
    <div style="display: inline-block">
      <div>{!! $properties->render() !!}</div>
    </div>
  </div>
</div>
</section>

@endsection
@section('footer')
@include('includes.footer')
@endsection
