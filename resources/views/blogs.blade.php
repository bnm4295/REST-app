@extends('layouts.app')

@section('content')

@foreach($blogs as $blog)
  <?php
    echo html_entity_decode($blog->description);

  ?>
@endforeach
<p>fill</p>
<p>fill</p>
<p>fill</p>
<p>fill</p>
<p>fill</p>
<p>fill</p>
<p>fill</p>
<p>fill</p>
<p>fill</p>
<p>fill</p>
<p>fill</p>
<p>fill</p>

@endsection('content')


@section('footer')
@include('includes.footer')
@endsection
