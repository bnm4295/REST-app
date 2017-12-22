@extends('layouts.app')

@section('content')




  {{$blog->id}}
  {{$blog->title}}
  <?php
    echo html_entity_decode($blog->description);

  ?>



@endsection
