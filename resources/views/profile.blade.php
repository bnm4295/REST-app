@extends('layouts.app')


@section('content')

@if(Auth::check() || Auth::guard('admin')->check() == true)

@if (Auth::guard('admin')->check() == true )
  <h1><strong>You are an admin!</strong></h1>
@endif
@auth
  <h1><strong>Name: {{Auth::user()->name}}</strong></h1>
  <h1><strong>Email: {{Auth::user()->email}}</strong></h1>
@endauth
@else
  <h1><strong>You are not logged in!</strong></h1>
@endif
</div>
@endsection
