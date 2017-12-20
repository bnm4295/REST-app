@extends('layouts.app')

@section('content')

  @foreach($offers as $offer)
    {{$offer['name']}}
  @endforeach

@endsection
