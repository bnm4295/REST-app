<?php

namespace Suuty\Http\Controllers;
use Aws\Resource\Aws;
use Aws\S3\S3Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Suuty\Property;
use Suuty\Media;
use Suuty\Offer;
use Suuty\User;
use File;
use Image;
use DB;
use Mail;

use Suuty\Mail\SaveSearch;

class PropertyController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth', ['except'=> ['create', 'index', 'show']] );
      $this->middleware('isVerified');
  }
  protected $properties_per_page = 6;
  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(Request $request)
  {
    $properties = Property::paginate($this->properties_per_page);
    /*
    $property = Property::find(165);
    Mail::to($request->user())
    ->send(new SaveSearch($property));
    */
    //$properties = Property::all();
    //$title = $request->input('title');
    //$properties = Property::->search($title);
    //$search = $request->input('title');
    //$properties = Property::where('title', 'like', '%' .$search. '%');
    return view('properties.index', compact('properties'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
      return view('properties.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
      date_default_timezone_set('America/Los_Angeles');
      $bucketName = 'suutybucket';
      $keyName = 'suuty-test-properties.xml';
      $filepath = 'suuty-test-properties.xml';


      $s3 = new S3Client([
        'version'     => 'latest',
        'region'      => 'ca-central-1',
        'credentials' => [
          'key'    => '',
          'secret' => ''
        ]
      ]);

/*
      'title',
      'area',
      'slug',
      'date',
      'firstdate',
      'seconddate',
      'details',
      'price',
      'house_type',
      'street_address',
      'route',
      'city',
      'state',
      'country',
      'postal_code',
      'number_of_beds',
      'number_of_baths',
      'sold',
*/
      $request->validate([
        'title' => 'required',
        'area' => 'required|numeric',
        'date' =>'required',
        'price' => 'required|numeric',
        'bidprice' => 'numeric',
        'images' => 'required',
        'details' => 'required',
        'house_type' => 'required',
        'number_of_beds' => 'required',
        'number_of_baths' => 'required',
        'city' => 'required',
      ]);
      $inputs = $request->all();
      $slug = strtolower($request->title);
      if ($count = Property::where('slug', 'like', "$slug%")->count()){
        $slug = str_finish($slug, "-$count");
      }
      $inputs['slug'] = preg_replace('/\s+/', '-', $slug);
      $inputs['user_id'] = Auth::id();
      //$propertyid = $this->get('id');
      $imagepaths = array();

      $picture = '';

      if ($request->hasFile('images')) {
          $files = $request->file('images');
          foreach($files as $file){
              $filename = $file->getClientOriginalName();
              $extension = $file->getClientOriginalExtension();
              $picture = $filename;
              $destinationPath = public_path('images');
              array_push( $imagepaths, $filename);
              $file->move($destinationPath, $picture);
          }
      }
      $encodedArray = array_map("utf8_encode", $imagepaths);
      $encodeimg = json_encode($encodedArray);
      $inputs['images'] = $encodeimg;
      $properties = Property::Create($inputs);

      $s3->registerStreamWrapper();
      $data = file_get_contents('s3://suutybucket/suuty-test-properties.xml');
      //echo $data;
      $lines = file('s3://suutybucket/suuty-test-properties.xml');
      $last = sizeof($lines) -1 ;
      unset($lines[$last]);

      //$size = filesize('s3://suutybucket/dsakdo.xml');
      //echo $size;
      $stream = fopen('s3://suutybucket/suuty-test-properties.xml', 'w');
      fwrite($stream, implode('', $lines));
      fclose($stream);

      // Open a stream in read-only mode
      if ($stream = fopen('s3://suutybucket/suuty-test-properties.xml', 'r')) {
      // While the stream is still open
      //while (!feof($stream)) {
      // Read 1024 bytes from the stream
      //echo fread($stream, 1024);
      //}

      // Be sure to close the stream resource when you're done with it
      //fclose($stream);
      $stream = fopen('s3://suutybucket/suuty-test-properties.xml', 'a', false, stream_context_create(array(
        's3' => array (
          'CacheControl' => 'no-cache',
          'ACL' => 'public-read',
          'ContentType' => 'text/xml',
        )
      )));

      /*fwrite($stream, '<marker id="12" name="Red Lantern" address="60 Riley Street, Darlinghurst, NSW" lat="{{$properties->latitude}}" lng="{{$properties->longitude}}" type="restaurant"/>
      </markers>');*/
      fwrite($stream, '<marker id="'.$properties->id.'" name="'.$properties->title.'" address="'.$properties->street_address.' '.$properties->route.' '.$properties->city.', '.$properties->state.'" lat="'.$properties->latitude.'" lng="'.$properties->longitude.'" type="'.$properties->house_type.'"
      img="'.$imagepaths[0].'" slug="'.$properties->slug.'" price="'.$properties->price.'"/>
      </markers>');
      fclose($stream);
      }
      //$imagecreate = Media::Create(['property_id' => $propertyid, 'filename' => serialize($imagepaths) ]);
      return redirect('/properties')->with('alert','success');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($slug)
  {
      //$property = Property::find($id);
      $property = Property::where('slug', $slug)->first();
      //dd($property);
      $propid = $property->id;
      $offers = Offer::where('prop_id', '=', $propid)
      ->get();
      $owner = User::find($property->user_id);


      return view('properties.show', compact('property', 'offers', 'owner'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
      $property = Property::find($id);
      return view('properties.edit', compact('property','id'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
      $request->validate([
        'title' => 'required',
        'details' => 'required',
        'date' => 'required',
        'price' => 'required',
        'house_type' => 'required',
        'number_of_beds' => 'required',
        'number_of_baths' => 'required',
        'city' => 'required',
      ]);

      $property = Property::find($id);
      if($property->title == $request->get('title')){
        ///dd($property->title . " " . $request->get('title'));
        //dd($request->get('slug'));
        $property->slug = $request->get('slug');
      }
      else{
        $property->title = $request->get('title');
        $slug = strtolower($property->title);

        //$property->slug = $slug;
        if ($count = Property::where('slug', 'like', "$slug%")->count()){
          $slug = str_finish($slug, "-$count");
        }
        $property->slug = preg_replace('/\s+/', '-', $slug);

      }
      $property->details = $request->get('details');
      $property->price = $request->get('price');
      $property->date = $request->get('date');
      $property->firstdate = $request->get('firstdate');
      $property->seconddate = $request->get('seconddate');
      $property->thirddate = $request->get('thirddate');
      $property->fourthdate = $request->get('fourthdate');
      $property->unit = $request->get('unit');
      $property->bidprice = $request->get('bidprice');
      $property->address_opt = $request->get('address_opt');
      $property->street_address = $request->get('street_address');
      $property->route = $request->get('route');
      $property->city = $request->get('city');
      $property->state = $request->get('state');
      $property->country = $request->get('country');
      $property->postal_code = $request->get('postal_code');
      $property->latitude = $request->get('latitude');
      $property->longitude = $request->get('longitude');
      $property->house_type = $request->get('house_type');
      $property->number_of_beds = $request->get('number_of_beds');
      $property->number_of_baths = $request->get('number_of_baths');
      $property->sold = $request->get('sold');



      $imagepaths = array();
      $picture = '';

      if ($request->hasFile('images')) {
          $files = $request->file('images');
          foreach($files as $file){
              $filename = $file->getClientOriginalName();
              $extension = $file->getClientOriginalExtension();
              $picture = $filename;
              $destinationPath = public_path('images');
              array_push( $imagepaths, $filename);
              $file->move($destinationPath, $picture);
          }
      }

      $encodedArray = array_map("utf8_encode", $imagepaths);
      $encodeimg = json_encode($encodedArray);
      $temp = $property['images'];
      $property['images'] = $encodeimg;
      if($picture == ''){
        $property['images'] = $temp;
      }
      $property->save();

      $bucketName = 'suutybucket';
      $keyName = 'suuty-test-properties.xml';
      $filepath = 'suuty-test-properties.xml';

      $s3 = new S3Client([
        'version'     => 'latest',
        'region'      => 'ca-central-1',
        'credentials' => [
          'key'    => '',
          'secret' => ''
        ]
      ]);
      $s3->registerStreamWrapper();

      /*
      <pre class="prettyprint linenums">
          <code class="language-xml">
          <?php
            echo $dsakdo = htmlspecialchars(file_get_contents('s3://suutybucket/suuty-properties.xml'), ENT_QUOTES);
          ?></code>
      </pre>
      */
      //$xml2 = file_get_contents('s3://suutybucket/suuty-test-properties.xml');
      $xml = simplexml_load_file('s3://suutybucket/suuty-test-properties.xml');

      //print_r($xml);

      //$counter = count($decodedarr);
      //$image = $decodedarr[$i];
      //dd($image);

      $decodedarr = json_decode( $property->images , true);
      $image = $decodedarr[0];
      foreach($xml->marker as $post){
        if($post['id'] == $id){
          $post['address'] = $property->street_address.' '.$property->route.' '.$property->city.', '.$property->state;
          $post['type'] = $property->house_type;
          $post['name'] = $property->title;
          $post['slug'] = $property->slug;
          $post['img'] = $image;
          $post['lat'] = $property->latitude;
          $post['lng'] = $property->longitude;
          $post['price'] = $property->price;
        }
        //echo htmlspecialchars( $post->asXML() ) ;
        //echo "<br>";
      }
      $save = $xml->asXML();

      $stream = fopen('s3://suutybucket/suuty-test-properties.xml', 'w', false, stream_context_create(array(
        's3' => array (
          'CacheControl' => 'no-cache',
          'ACL' => 'public-read',
          'ContentType' => 'text/xml',
        )
      )));
      fwrite($stream, $save);
      fclose($stream);

      return redirect('/properties')->with('alert','success');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
      $bucketName = 'suutybucket';
      $keyName = 'suuty-test-properties.xml';
      $filepath = 'suuty-test-properties.xml';

      $s3 = new S3Client([
        'version'     => 'latest',
        'region'      => 'ca-central-1',
        'credentials' => [
          'key'    => '',
          'secret' => ''
        ]
      ]);
      $s3->registerStreamWrapper();
      $xml = simplexml_load_file('s3://suutybucket/suuty-test-properties.xml');

      foreach($xml->marker as $post){
        if($post['id'] == $id){
          $dom = dom_import_simplexml($post);
          $dom->parentNode->removeChild($dom);
        }
      }
      $save = $xml->asXML();

      $stream = fopen('s3://suutybucket/suuty-test-properties.xml', 'w', false, stream_context_create(array(
        's3' => array (
          'CacheControl' => 'no-cache',
          'ACL' => 'public-read',
          'ContentType' => 'text/xml',
        )
      )));
      fwrite($stream, $save);
      fclose($stream);
      $property = Property::find($id);
      $property->delete();
      return redirect('/properties')->with('alert','success');
  }
  public function makeSlugFromTitle($title)
  {
      $slug = Str::slug($title);

      $count = Conversation::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();

      return $count ? "{$slug}-{$count}" : $slug;
  }
  public function fetchNextPropertySet($page){

  }


}
