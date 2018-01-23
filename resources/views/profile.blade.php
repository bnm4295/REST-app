@extends('layouts.app')


@section('content')

@if(Auth::check() || Auth::guard('admin')->check() == true)

@if (Auth::guard('admin')->check() == true )
  <h1><strong>You are an admin!</strong></h1>
@endif
@auth
<div class="container">
  <h2><strong>Name: {{Auth::user()->name}}</strong></h2>
  <h2><strong>Email: {{Auth::user()->email}}</strong></h2>
</div>
@endauth
@else
  <h1><strong>You are not logged in!</strong></h1>
@endif
</div>
@endsection
