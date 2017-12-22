<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Suuty\User;
Route::get('/', function () {
    return view('homepage');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/resources', function () {
    return view('resources');
});
Route::get('/blogs', function () {
    return view('blogs');
});

Auth::routes();

Route::get('my-profile', function (){
    //$name = $user->name;
    return view('profile');
});
Route::get('/mailable', function () {
    $property = Suuty\Property::find(165);
    return new Suuty\Mail\SaveSearch($property);
});
//$user = \Auth::user(); dd($user);
//Route::get('/properties', 'SearchController@filter');

//Route::post('/testing', function(){
//    dd(Input::all());
//});
//Route::get('/testing', 'PaymentController@payment');

Route::resource('payments','PaymentController');
Route::resource('offers', 'OfferController');

Route::post ( 'testing', function (Request $request) {
    \Stripe\Stripe::setApiKey ( 'sk_test_KSSmMrMppIdQdSwCN1N1XHfx' );
    $id = Auth::id();
    $user = User::find($id);
    try {
        \Stripe\Charge::create ( array (
                "amount" => 990 * 100,
                "currency" => "cad",
                "source" => $request->input ( 'stripeToken' ), // obtained with Stripe.js
                "description" => $user->email
        ) );
        Session::flash ( 'success-message', 'Payment done successfully !' );
        return Redirect::back ();
    } catch ( \Exception $e ) {
        Session::flash ( 'fail-message', "Error! Please Try again." );
        return Redirect::back ();
    }
} );
Route::resource('blogs', 'BlogController');
Route::resource('properties','PropertyController',
  array('except'=> ['index', 'store', 'destroy'] )
);
Route::get('properties', 'PropertyController@index')->name('properties.index');
Route::delete('properties/{property}', 'PropertyController@destroy')->name('properties.destroy');//->middleware('auth:admin');
Route::post('properties', 'PropertyController@store')->name('properties.store');

Route::prefix('admin')->group(function(){
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
});
