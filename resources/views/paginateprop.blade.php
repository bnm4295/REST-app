<div class="container-fluid">
<section class="properties endless-pagination" data-next-page="{{ $properties->nextPageUrl() }}">
  <h3>Properties</h3>
  @foreach($properties as $property)
  <div>
      <div class="col-md-4 text-center">
          <div class ="panel panel-default">
            <div class="panel-heading">
                <strong>ID : {{$property->id}}</strong>
                <strong>Title: {{$property->title}}</strong>
                <hr>
                <strong>Number of Beds: {{$property->number_of_beds}} </strong>
                <br>
                <strong>Number of Baths: {{$property->number_of_baths}} </strong>
                <br>
                <?php
                  $decodedarr = json_decode( $property->images , true);
                  $counter = count($decodedarr);
                  $image = $decodedarr[0];
                ?>
                <br>

                <a href="{{ url('properties')}}/{{$property->slug}}"><input class="img-rounded" value="" type="submit" style="border: solid 0px #000000; height: 200px; width: 60%;
                 background-image: url({{ asset('/../images/') }}/{{$image}});
                  background-size: 300px; background-repeat: no-repeat;"/></a>

            </div>
          </div>
      </div>
  </div>
  @endforeach
{!! $properties->render() !!}
</section>
</div>
