@extends('layouts.app')

@section('content')
@if(Auth::check() || (Auth::guard('admin')->check() == true ))
  <div class="container">
    <?php
      $properties = DB::table('properties')->where('user_id', Auth::id() )->get();
      if($properties == "[]"){
        echo '<br>';
        echo "<h3 style='text-align: center;'>No Properties</h3>";
      }
    ?>
    @foreach($properties as $post)
    <?php
    //for ($i = 0 ; $i < $counter; $i++ ){
    $decodedarr = json_decode( $post->images , true);
    $counter = count($decodedarr);
    //$image = $decodedarr[$i];
    $image = $decodedarr[0];
    //echo $decodedarr[$i];
    ?>
    <div class="col-md-5 col-sm-6 col-xs-12 no-padding">
      <div id="property-listings">
          <div class ="panel panel-default">
              <a id="{{$post->id}}" href="{{ url('properties')}}/{{$post->slug}}"><input class="img-rounded" value="" type="submit" style="border: solid 0px #000000; height: 200px; width: 100%;
                background-image: url({{ asset('/../images/') }}/{{$image}});
                background-size: 450px; background-repeat: no-repeat;"/></a>
              <div class="panel-heading">
                <div style="text-align: left;">
                  <h3><p><strong>{{$post->title}}</strong></p></h3>
                  <h4><strong>${{$post->price}}</strong></h4>
                  <hr>
                  <p><b>Beds: {{$post->number_of_beds}} | Baths: {{$post->number_of_baths}} </b></p>
                  <p><strong>Sqft: {{$post->area}}</strong></p>
                  <strong>
                    {{$post->street_address}}
                    {{$post->route}}
                    {{$post->city}}
                    {{$post->state}}
                  </strong>
                  <form action="{{action('PropertyController@edit', $post->id )}}" method="get">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="EDIT">
                    <button class="btn btn-success" type="submit">Edit</button>
                  </form>

                  <form action="{{action('PropertyController@destroy', $post->id )}}" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Do you really want to delete this property?')">
                      Delete
                    </button>
                  </form>
                </div>
              </div>
            </div>
        </div>
      </div>
    @endforeach
  </div>`
@endif
@endsection
