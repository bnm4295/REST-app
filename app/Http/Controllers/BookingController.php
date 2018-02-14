<?php

namespace Suuty\Http\Controllers;

use Illuminate\Http\Request;
use Suuty\Booking;
use Session;

class BookingController extends Controller
{
    public function store(Request $request){
      $request->validate([
        'name' => 'required',
        'email' => 'required',
        'description' => 'required',
      ]);
      $inputs = $request->all();
      $offers = Booking::Create($inputs);
      Session::flash('success', 'Request Successful!');
      return redirect()->back();
    }
}
