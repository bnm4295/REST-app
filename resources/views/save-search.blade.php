@extends('layouts.app')

@section('content')
@if(Auth::check() || (Auth::guard('admin')->check() == true ))
  <div class="container">
    <?php
      $savedsearch = DB::table('savesearch')->where('user_id', Auth::id() )->get();
      if($savedsearch == "[]"){
        echo '<br>';
        echo "<h3 style='text-align: center;'>No saved searches</h3>";
      }
    ?>
    @foreach($savedsearch as $post)
      <a href="{{url('/') .$post->url}}">{{$post->url}}<a/>
      <form id="delete-offer" action="{{action('SaveSearchController@destroy', $post->id ) }}" method="post">
        {{csrf_field()}}
        <input name="_method" type="hidden" value="delete">
        <button class="btn btn-danger" type="submit" onclick="return confirm('Do you really want to delete this search?')">
          Delete
        </button>
      </form>
    @endforeach
  </div>`
@endif
@endsection
