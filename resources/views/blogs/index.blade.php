@extends('layouts.app')
@include('includes.socialshare')
@section('content')
<section class="splash-section">
  <div id="blogs-media" class="splash-inner-media"></div>
  <div class="splash-inner-content">
    <div class="container">
      <div class="container page-container">
        <div class="splash-title">
          <p style="text-align: center; font-size: 50px; color: white">Blogs</p>
          <p style="text-align: center; font-size: 25px; color: white">Welcome to the New Home of Real Estate</p>
        </div>
      </div>
      <div class="row">
      </div>
    </div>
  </div>
</section>

<!--div class="container">
@foreach($blogs as $blog)

    echo html_entity_decode($blog->description);

@endforeach
</div>-->

<div class="container">
  <div class="row">
    <h3 style="text-align: center">Blog Posts</h3>
  </div>
  <div class="row">
    @foreach($blogs as $blog)
    <?php
    $decodedarr = json_decode( $blog->images , true);
    $counter = count($decodedarr);
    $image = $decodedarr[0];
    ?>
    <div class="col-md-4 text-center">
      <div class ="panel panel-default">
        <a href="{{ url('blogs')}}/{{$blog->slug}}"><img src="{{ asset('/../images/') }}/{{$image}}"
          style="border: solid 0px #000000; height: 200px; width: 100%;
          background-size: 375px; background-repeat: no-repeat;"></a>
        <div class="panel-heading">
          <div style="text-align: left;">
            <strong>{{$blog->title}}</strong>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="marginfix" style="text-align: center;">
    <button class="btn btn-primary btn-lg" style="border-radius: 5px" onclick="window.location.href='{{ URL::to('properties') }}'">Find Your Home</button>
    <button class="btn btn-primary btn-lg" style="border-radius: 5px" onclick="window.location.href='{{ URL::to('properties/create') }}'">List Your Home</button>
  </div>
</div>

@endsection('content')
@section('footer')
@include('includes.footer')
@endsection
