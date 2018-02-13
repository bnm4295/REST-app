<?php

namespace Suuty\Http\Controllers;

use Illuminate\Http\Request;
use Suuty\Booking;

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
      return redirect()->back();
    }
}
