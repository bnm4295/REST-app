<?php

namespace Suuty\Http\Controllers;

use Illuminate\Http\Request;
use Suuty\Offer;
use Suuty\Blog;
use Suuty\Property;
class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    protected $per_page = 6;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::paginate($this->per_page);
        $offers = Offer::paginate($this->per_page);
        $blogs = Blog::all();
        return view('admin', compact('properties','offers', 'blogs'));
    }
}
