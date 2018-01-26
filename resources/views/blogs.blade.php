@extends('layouts.app')

@section('content')
<section class="splash-section">
  <div class="splash-inner-media"></div>
  <div class="splash-inner-content">
    <div class="container">
      <div id="home-container" class="container">
        <div class="splash-title">
          <p style="text-align: center; font-size: 50px; color: white">Blogs</p>
          <p style="text-align: center; font-size: 25px; color: white">Welcome to the New Home of Real Estate</p>
        </div>
      </div>
      <div class="row" style="height: 500px">
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
    @foreach($blogs as $blog)
    <?php
    $decodedarr = json_decode( $blog->images , true);
    $counter = count($decodedarr);
    $image = $decodedarr[0];
    ?>
    <div class="col-md-4 text-center">
      <div class ="panel panel-default">
        <a href="{{ url('blogs')}}/{{$blog->id}}"><input class="img-rounded" value="" type="submit" style="border: solid 0px #000000; height: 200px; width: 100%;
          background-image: url({{ asset('/../images/') }}/{{$image}});
          background-size: 375px; background-repeat: no-repeat;"/></a>
        <div class="panel-heading">
          <div style="text-align: left;">
            <strong>{{$blog->title}}</strong>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endforeach
</div>


@endsection('content')
@section('footer')
@include('includes.footer')
@endsection
