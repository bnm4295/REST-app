<?php

namespace Suuty\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Suuty\Offer;
use Suuty\User;
use Session;
class OfferController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('isVerified');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$offers = Offer::all();
        //return view('offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
        'name' => 'required',
        'offerprice' => 'required|numeric',
        'comments' => 'required',
      ]);
      $inputs = $request->all();
      $inputs['user_id'] = Auth::id();

      $offers = Offer::Create($inputs);
      Session::flash('success', 'Success');
      return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $offer = Offer::find($id);
        $offer->name = $request->get('name');
        $offer->offerprice = $request->get('offerprice');
        $offer->comments = $request->get('comments');
        $offer->status = $request->get('status');
        $offer->save();
        return redirect('/admin')->with('alert','success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $offer = Offer::find($id);
        $offer->delete();
        return redirect('/admin');
    }
}
