<?php

namespace Suuty\Http\Controllers;

use Illuminate\Http\Request;
use Suuty\Form;
use Mail;

class FormController extends Controller
{
    public function store(Request $request){
      $request->validate([
        'name' => 'required',
        'email' =>'required|email',
      ]);
      $providerarr = array();
      if ($request->has('provider')) {
          $providers = $request->get('provider');
          foreach($providers as $provider){
              array_push( $providerarr, $provider);
          }
      }
      $encodedArray = array_map("utf8_encode", $providerarr);
      $encodeprovider = json_encode($encodedArray);
      $inputs = $request->all();
      $inputs['provider'] = $encodeprovider;
      $form = Form::Create($inputs);

      $messages =
        "<b>Someone has sent you a contact form</b><br>Comments: ".$request->description . "<br>From: ".$request->name.
        "<br>Email: ".$request->email.
        "<br>";

      Mail::send(['html' =>'emails.template'], ['text' => $messages], function($message)
      {
        $message->subject('Suuty - Contact Form');
        $message->from('david@suuty.com', 'Suuty');
        $message->to('david@suuty.com'); //change to another email? add bcc?
      }); //->bcc('info@propels.ca')
      return redirect()->back();
    }
}
