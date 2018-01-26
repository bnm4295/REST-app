<?php

namespace Suuty\Http\Controllers;

use Illuminate\Http\Request;
use Suuty\User;
use Suuty\Property;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('isVerified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    protected $properties_per_page = 3;

    public function index(Request $request)
    {
      $properties = Property::paginate($this->properties_per_page);
      /*
      if($request->ajax()){
        return [
          'properties' => view('properties.ajax.index')->with(compact('properties'))->render(),
          'next_page' => $properties->nextPageUrl()
        ];
      }
      */
      return view('homepage')->with(compact('properties'));
    }
    public function fetchNextPropertySet($page){

    }
}
