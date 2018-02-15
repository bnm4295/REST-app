<section class="properties endless-pagination" data-next-page="{{ $properties->nextPageUrl() }}">
  <div class="container-fluid">
    <h3 style="font-family: 'Helvetica Neue', sans-serif; font-size: 30px; font-weight: bold; letter-spacing: -1px; text-indent: 15px;">New Listings</h3>
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
                  <h3><p><strong>{{$property->title}}</strong></p></h3>
                  <h4><strong>${{$property->price}}</strong></h4>
                  <hr>
                  <p><b>Beds: {{$property->number_of_beds}} | Baths: {{$property->number_of_baths}} </b></p>
                  <p><strong>Sqft: {{$property->area}}</strong></p>
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
