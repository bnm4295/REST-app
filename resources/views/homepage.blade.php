@extends('layouts.app')

@section('content')

@if (session('status'))
<div class="alert alert-success">
  {{ session('status') }}
</div>
@endif

<section class="splash-section">
  <div class="splash-inner-media"></div>
  <div class="splash-inner-content">
    <div id="home-container" class="container">
      <div class="splash-title">
        <h3 style="font-size: 60px;">Your Next Move</h3>
        <h2 style="font-size: 35px;">Simple. Fair. Revolutionary.</h2>
        <h1 style="font-size: 20px;">#DIYREALTY #REALESTATEREVOLUTION</h1>
      </div>
      <div class="row" style="height: 500px">
          @include('includes.advsearchhome')
      </div>
    </div>
  </div>
</section>



<div class="container">
  <div id="results">@include('includes.propertydisplay')</div>
</div>

<section class="splash-section">
  <div class="splash-inner-media"></div>
  <div class="splash-inner-content">
    <div class="container" style="width: 800px">
      <div class="row" style="height: 500px">
        <p style="text-align: center; font-size: 50px; color: white">something here</p>
      </div>
    </div>
  </div>
</section>


@endsection

@section('footer')
@include('includes.footer')
@endsection
