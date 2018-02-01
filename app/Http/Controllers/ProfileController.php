<?php

namespace Suuty\Http\Controllers;

use Illuminate\Http\Request;
use Suuty\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function show(){

    }
    public function update(Request $request, $id){
      $request->validate([
        'name' => 'required',
        'aboutme' =>'required',
      ]);
      $userfind = User::find($id);
      $userfind->name = $request->get('name');
      $userfind->aboutme = $request->get('aboutme');
      $imagepaths = array();
      $picture = '';
      if ($request->hasFile('profileimg')) {
            $file = $request->file('profileimg');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $picture = $filename;
            $destinationPath = public_path('images');
            array_push( $imagepaths, $filename);
            $file->move($destinationPath, $picture);
            $encodedArray = array_map("utf8_encode", $imagepaths);
            $encodeimg = json_encode($encodedArray);
            $temp = $userfind['profileimg'];
            $userfind['profileimg'] = $encodeimg;
            if($picture == ''){
              $userfind['profileimg'] = $temp;
            }
      }
      $userfind->save();
      return redirect('/my-profile')->with('alert','success');
    }
}
