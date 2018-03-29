<?php

namespace Suuty\Http\Controllers;

use Illuminate\Http\Request;
use Suuty\Booking;
use Suuty\Property;
use Suuty\User;
use Mail;
use Session;

class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isVerified');
    }
    public function store(Request $request){
      $request->validate([
        'name' => 'required',
        'email' => 'required',
        'description' => 'required',
      ]);
      $inputs = $request->all();
      $offers = Booking::Create($inputs);
      //$from maybe add person's email for another use.
      $from = $request->email;
      $prop_id = $inputs['prop_id'];
      $property = Property::find($prop_id);
      $user_id = $property->user_id;
      $user = User::find($user_id);
      $useremail = $user->email;
      $messages =
        "<b>Someone has requested viewing times for your property!</b><br>Comments: ".$request->description . "<br>First Date: ".$request->openfirst.
        "<br>Second Date: ".$request->opensecond.
        "<br>";
      Mail::send(['html' =>'emails.template'], ['text' => $messages], function($message) use ($useremail)
      {
        $message->subject('Suuty - Requested Viewing Time');
        $message->from('david@suuty.com', 'Suuty');
        $message->to($useremail);
      });
      Session::flash('success', 'Request Successful!');
      return redirect()->back();
    }
}
