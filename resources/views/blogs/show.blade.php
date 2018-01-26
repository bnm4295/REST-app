@extends('layouts.app')

@section('content')
<?php
$decodedarr = json_decode( $blog->images , true);
$counter = count($decodedarr);
$image = $decodedarr[0];
?>
<div class="container">
  <strong><h1>{{$blog->title}}</h1></strong>
  <div class="row">
    <div class="col-md-8 text-center">
      <img src="{{ asset('/../images/') }}/{{$image}}" style="border: solid 0px #000000; width: 100%;"/>
    </div>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class ="panel panel-default">
        <div class="panel-heading">
          <?php
            echo html_entity_decode($blog->description);
          ?>
        </div>
      </div>
    </div>
    </div>
</div>

@endsection

@section('footer')
@include('includes.footer')
@endsection
