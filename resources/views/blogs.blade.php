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
@foreach($blogs as $blog)
  <?php
    echo html_entity_decode($blog->description);

  ?>
@endforeach


@endsection('content')


@section('footer')
@include('includes.footer')
@endsection
