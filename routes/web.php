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

//AUTH
Auth::routes();

//GET
Route::get('/user/logout', 'Auth\LoginController@userLogout')->name('user.logout');
//Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index')->name('home');
Route::get('/paginateprop', function(){
    return view('paginateprop');
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



//STRIPE
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

//RESOURCES
Route::resource('payments','PaymentController');
Route::resource('offers', 'OfferController');
Route::resource('blogs', 'BlogController');
Route::resource('properties','PropertyController',
array('except'=> ['index', 'store', 'destroy', 'show'] )
);

Route::get('properties/{slug}', 'PropertyController@show')->name('properties.show');
Route::get('properties', 'PropertyController@index')->name('properties.index');
Route::delete('properties/{property}', 'PropertyController@destroy')->name('properties.destroy');//->middleware('auth:admin');
Route::post('properties', 'PropertyController@store')->name('properties.store');


//ADMIN
Route::prefix('admin')->group(function(){
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
});

//MESSAGES
Route::group(['prefix' => 'messages'], function () {
    Route::get('/', ['as' => 'messages', 'uses' => 'MessagesController@index']);
    Route::get('/unread', ['as' => 'messages.unread', 'uses' => 'MessagesController@unread']); // ajax + Pusher
    Route::get('/create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
    Route::post('/', ['as' => 'messages.store', 'uses' => 'MessagesController@store']);
    Route::get('{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
    Route::put('{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
    Route::get('{id}/read', ['as' => 'messages.read', 'uses' => 'MessagesController@read']); // ajax + Pusher
});
