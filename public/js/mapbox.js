mapboxgl.accessToken = 'pk.eyJ1Ijoic3V1dHkiLCJhIjoiY2phMnMzdzFtOW1wdDMzczRsZ3c5Zno3cCJ9.tpwGqkBIl3pREGEHS-K-tA';
var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/suuty/cja8hsj160mim2rqurzw2lo8s',
    center: [-123.116226,49.246292],
    zoom: 7
});
var geocoder = new MapboxGeocoder({
    accessToken: mapboxgl.accessToken
});
var DATASET = 'cja9z92340bxx2qpefhdsehi2';
var client = new MapboxClient('sk.eyJ1Ijoic3V1dHkiLCJhIjoiY2phNGdxZWQzMzBoMTMycG9jZHJlano1byJ9.-dt7hBfroffbuSFlYqHVBQ');
var submitForm = $('#submit-property');
var delFormbtn = $('.btn-danger');
var delForm = $('#delete-property');
var editForm = $('#edit-property');
/*
delFormbtn.on( 'click', function (event) {
  if(confirm('Do you really want to delete this property?')){
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      type: editForm.attr('method'),
      url: editForm.attr('action'),
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
        console.log(data);
        console.log();
      //  console.log( $_GET['ajaxid'] );
        function asyncDelete(){
          var dfd = jQuery.Deferred();
          setTimeout( function() {
            dfd.resolve("done");
          }, 2000);
          client.deleteFeature("", DATASET, function(err, feature) {
            if(!err) console.log('deleted');
          });
          return dfd.promise();
        }
        //$.when( asyncDelete() ).then( function() {  });
        //location.href = "http://localhost:8080/suuty/server.php/properties";
        return true;
      },
      error: function (data) {
        console.log('An error occurred.');
      },
    });
  }
  else{
    return false;
  }
});
*/
submitForm.submit(function (e) {
  e.preventDefault();
  var formData = new FormData(this);
    $.ajax({
      type: submitForm.attr('method'),
      url: submitForm.attr('action'),
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      success: function (data) {
          console.log('Submission was successful.');
          var feature = {
            "type": "Feature",
            "properties": {
              "id": $("#get_title").val() + $("#getprice").val(),
              "title": $("#get_title").val(),
              "address": $("#address").val()
            },
            "geometry": {
              "type": "Point",
              "coordinates": [parseFloat($('#getlong').val()), parseFloat($('#getlat').val())]
            }
          };
          console.log(JSON.stringify(feature));
          function asyncInsert(){
            var dfd = jQuery.Deferred();
            setTimeout( function() {
              dfd.resolve("done");
            }, 2000);
            client.insertFeature(feature, DATASET, function(err, feature) {
              var promisedone = JSON.stringify(feature);
            });
            return dfd.promise();
          }
          $.when( asyncInsert() ).then( function() { location.href = submitForm.attr('action'); });

      },
    });

});

map.addControl(geocoder);

// After the map style has loaded on the page, add a source layer and default
// styling for a single point.
map.on('load', function() {
    map.addSource('single-point', {
        "type": "geojson",
        "data": {
            "type": "FeatureCollection",
            "features": []
        }
    });

    map.addLayer({
        "id": "point",
        "source": "single-point",
        "type": "circle",
        "paint": {
            "circle-radius": 10,
            "circle-color": "#007cbf"
        }
    });
});
// Listen for the `geocoder.input` event that is triggered when a user
// makes a selection and add a symbol that matches the result.

geocoder.on('result', function(ev) {
  map.getSource('single-point').setData(ev.result.geometry);
});

// When a click event occurs on a feature in the places layer, open a popup at the
// location of the feature, with description HTML from its properties.
map.on('click', 'places', function (e) {
    new mapboxgl.Popup()
        .setLngLat(e.features[0].geometry.coordinates)
        .setHTML(e.features[0].properties.address)
        .addTo(map);
});

// Change the cursor to a pointer when the mouse is over the places layer.
map.on('mouseenter', 'places', function () {
    map.getCanvas().style.cursor = 'pointer';
});

// Change it back to a pointer when it leaves.
map.on('mouseleave', 'places', function () {
    map.getCanvas().style.cursor = '';
});

if(window.location.href == ("http://localhost:8080/suuty/server.php/properties/create") ){
  geocoder.on('result', function(e) {
    //console.log('result: ', e.result.place_name);
    var getplacename = e.result.place_name;
    var getlong = e.result.geometry.coordinates[0];
    var getlat = e.result.geometry.coordinates[1];
    $.ajax({
      type: 'POST',
      url: "/suuty/resources/views/ajax.php",
      data: { getlong: getlong, getlat: getlat, address: getplacename},
      dataType: 'json',
      success: function(data){
        $("#address").val(data.address);
        $('#getlong').val(data.longitude);
        $('#getlat').val(data.latitude);
      }
    });
    //$.post("/suuty/server.php/properties/create", {coordinates});
    //console.log('results', e.features['geometry']);
    //      console.log(t);
    //alert(t['geometry']);
  });
}
