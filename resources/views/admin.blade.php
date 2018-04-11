@extends('layouts.app')

@section('content')
@if (session('alert'))
    <div class="alert alert-success" style="z-index: 1; text-align:center; position: absolute; width: 100%">
        <h3>{{ session('alert') }}</h3>
    </div>
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
