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
              <a id="{{$post->id}}" href="{{ url('properties')}}/{{$post->slug}}"><img src="{{ asset('/../images/') }}/{{$image}}" style="border: solid 0px #000000; height: 200px; width: 100%;
                background-size: 450px; background-repeat: no-repeat;"></a>
              <div class="panel-heading">
                <div style="text-align: left;">
                  <a style="color: black" href="{{ url('properties')}}/{{$post->slug}}">
                    <h3 class="add-ellipsis"><strong>{{$post->title}}</strong></h3>
                    <h4><strong>${{$post->price}}</strong></h4>
                  </a>
                  <hr>
                  <p><i class="fas fa-bed"></i><b> {{$post->number_of_beds}}</b> | <i class="fas fa-bath"></i><b> {{$post->number_of_baths}} </b></p>
                  <p><i class="fas fa-chart-area"></i><b> {{$post->area}}sqft&sup2;</b></p>
                  <p class="add-ellipsis"><strong>
                    {{$post->street_address}}
                    {{$post->route}}
                    {{$post->city}}
                    {{$post->state}}
                  </strong></p>
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
  </div>
@else
<script>
window.location.href = "/login";
</script>
@endif
@endsection
