@extends('layouts.app')

@section('content')
<?php
  $decodedarr = json_decode( Auth::user()->profileimg , true);
  $image = $decodedarr[0];
?>
@if (session('alert'))
    <div class="alert alert-success" style="z-index: 2; text-align:center; position: absolute; width: 100%">
        <h3>{{ session('alert') }}</h3>
    </div>
@endif
@if ($errors->any())
  <div class="alert alert-danger" style="z-index: 2; position: absolute; width: 100%">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
<div class="container">
@if(Auth::check() || Auth::guard('admin')->check() == true)
  @if (Auth::guard('admin')->check() == true )
    <h1><strong>You are an admin!</strong></h1>
  @endif
  <div class="row">
    <h2><strong>Name: {{Auth::user()->name}}</strong></h2>
    <img src="/images/{{$image}}" width="130px" height="130px">
    <h2><strong>Email: {{Auth::user()->email}}</strong></h2>
    <h2><strong>About Myself:</strong></h2>
    <b><p style="font-size: 20px"rows="5" cols="5" name="aboutme" placeholder="Description">{{Auth::user()->aboutme}}</p></b>
    <hr>
  </div>
    @include('includes.profileupdate')
@else
  <h1><strong>You are not logged in!</strong></h1>
@endif
</div>

@endsection
