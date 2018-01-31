<?php

namespace Suuty\Http\Controllers;

use Illuminate\Http\Request;
use Suuty\Form;

class FormController extends Controller
{
    public function store(Request $request){
      $request->validate([
        'name' => 'required',
        'email' =>'required',
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
      return redirect()->back()->with('alert','success');
    }
}
