<section class="properties endless-pagination" data-next-page="{{ $properties->nextPageUrl() }}">
  <div class="container-fluid">
    <h3 style="font-family: 'Helvetica Neue', sans-serif; font-size: 30px; font-weight: bold; letter-spacing: -1px; text-indent: 15px;">Featured Listings</h3>
    <hr>
    @foreach($properties as $property)
    <?php
    $decodedarr = json_decode( $property->images , true);
    $counter = count($decodedarr);
    $image = $decodedarr[0];
    ?>
    <div>
        <div class="col-md-4 text-center">
            <div class ="panel panel-default">
                <a href="{{ url('properties')}}/{{$property->slug}}"><img src="{{ asset('/../images/') }}/{{$image}}" style="border: solid 0px #000000; height: 200px; width: 100%;
                  background-size: 350px; background-repeat: no-repeat;"></a>
              <div class="panel-heading">
                <div style="text-align: left;">
                  <h3 class="proptitle"><strong>{{$property->title}}</strong></h3>
                  <h4><strong>${{$property->price}}</strong></h4>
                  <hr>
                  <p><i class="fas fa-bed"></i><b> {{$property->number_of_beds}}</b> | <i class="fas fa-bath"></i><b> {{$property->number_of_baths}} </b></p>
                  <p><i class="fas fa-chart-area"></i><b> {{$property->area}}sqft&sup2;</b></p>
                  <strong>
                    {{$property->street_address}}
                    {{$property->route}}
                    {{$property->city}}
                    {{$property->state}}
                  </strong>
                </div>
              </div>
            </div>
        </div>
    </div>
    @endforeach
  </div>
  <div style="margin: 0 auto; width: 140px;">{!! $properties->render() !!}</div>
</section>
