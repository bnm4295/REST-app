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
    <div class="container" style="width: 800px">
      <div class="row">
          @include('includes.advsearch')
      </div>
    </div>
  </div>
</section>



<div class="container">
  <div id="results">@include('includes.propertydisplay')</div>
</div>


@endsection

@section('footer')
@include('includes.footer')
@endsection
