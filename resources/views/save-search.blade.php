@extends('layouts.app')

@section('content')
@if(Auth::check() || (Auth::guard('admin')->check() == true ))
  <div class="container">
    <h2>Saved Searches</h2>
    <?php
      $savedsearch = DB::table('savesearch')->where('user_id', Auth::id() )->get();
      if($savedsearch == "[]"){
        echo '<br>';
        echo "<h4>No saved searches found. You can search your desired property below.</h4>";
      }
    ?>
    @foreach($savedsearch as $post)
      <a href="{{url('/') .$post->url}}">
        @if($post->addr != "")
          City: {{$post->addr}} |
        @endif
        PriceMIN: ${{$post->price_left}} | PriceMAX: ${{$post->price_right}} |
        AreaMIN: {{$post->area_left}}sqft | AreaMAX: {{$post->area_right}}sqft
        @if($post->number_of_beds != 0)
          Beds: {{$post->number_of_beds}}
        @endif
        @if($post->number_of_baths != 0)
          Baths: {{$post->number_of_baths}}
        @endif</a>
      <form id="delete-offer" action="{{action('SaveSearchController@destroy', $post->id ) }}" method="post">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="delete">
        <button class="btn btn-danger" type="submit" onclick="return confirm('Do you really want to delete this search?')">
          Delete
        </button>
      </form>
    @endforeach
    &nbsp;
    @include('includes.advsearch')
  </div>
@endif
@endsection
