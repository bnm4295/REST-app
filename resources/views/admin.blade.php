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
                </div>
            </div>
        </div>
    </div>
    <div class="row">
      <h3 style="text-align: center">Blog Posts</h3>
    </div>
      <h3><a href="{{ asset('/../blogs/create') }}" >Create a Blog</a></h3>

      @foreach($blogs as $blog)
        <div class="col-md-4 text-center">
          {{$blog->title}}
          <div class ="panel panel-default">
              <form action="{{action('BlogController@show', $blog['id'])}}" method="get">
                @if($blog['images'] != "")
                  <?php
                    $decodedarr = json_decode( $blog->images , true);
                    $counter = count($decodedarr);
                    //$image = $decodedarr[$i];
                    $image = $decodedarr[0];
                  ?>
                  <input class="img-rounded" value="" type="submit" style="border: solid 0px #000000; height: 200px; width: 100%;
                   background-image: url({{ asset('/../images/') }}/{{$image}});
                   background-size: 300px; background-repeat: no-repeat;"/>
                @endif
              </form>
              <form id="delete-blog" action="{{action('BlogController@destroy', $blog['id'])}}" method="post">
                {{csrf_field()}}
                <input name="_method" type="hidden" value="delete">
                <button class="btn btn-danger" type="submit" onclick="return confirm('Do you really want to delete this blog?')">
                  Delete
                </button>
              </form>
            </div>
          </div>
        @endforeach
</div>
@endsection
@section('footer')
@include('includes.footer')
@endsection
