@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADMIN Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in as ADMIN!
                    <br>
                    @foreach($offers as $offer)
                      {{$offer['id']}}
                      {{$offer['name']}}
                      <form id="approve-offer" method="post" action="{{ action('OfferController@update', $offer['id'] )}}" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <input name="_method" type="hidden" value="PATCH">
                        <input type="hidden" name="status" class="form-control input-lg" value="1">
                        <input type="hidden" name="name" class="form-control input-lg" value="{{$offer->name}}">
                        <input type="hidden" name="offerprice" class="form-control input-lg" value="{{$offer->offerprice}}">
                        <input type="hidden" name="comments" class="form-control input-lg" value="{{$offer->comments}}">
                        <button class="btn btn-success" type="submit">Approve</button>
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
  </div class="row">
    <a href="{{ asset('/../server.php/blogs/create') }}" >Create a Blog</a>
    @foreach($blogs as $blog)
      <form action="{{action('BlogController@show', $blog['id'])}}" method="get">
        <!--input name="_method" type="hidden" value="show">-->
        @if($blog['images'] != "")
          <?php
            $decodedarr = json_decode( $post->images , true);
            $counter = count($decodedarr);
            //$image = $decodedarr[$i];
            $image = $decodedarr[0];
          ?>
          <input class="img-rounded" value="" type="submit" style="border: solid 0px #000000; height: 200px; width: 60%;
           background-image: url({{ asset('/../images/') }}/{{$image}});
            background-size: 300px; background-repeat: no-repeat;"/>
          <!--img class="img-rounded" style="height: 230px; width: 100%" src="{{ asset('/../images/') }}/{{$image}}"/>
          <button class="btn btn-success" type="submit">Show</button>-->
        @endif
        <input value="{{$blog->id}}" type="submit">
      </form>
    @endforeach
  </div>
</div>
@endsection
