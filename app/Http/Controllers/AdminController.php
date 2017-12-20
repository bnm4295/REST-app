<?php

namespace Suuty\Http\Controllers;

use Illuminate\Http\Request;
use Suuty\Offer;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::all();
        return view('admin', compact('offers'));
    }
}
