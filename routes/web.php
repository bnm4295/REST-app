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

Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');
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
Route::get('/my-profile/savesearch', function(){
    return view('save-search');
});

Route::get('/my-profile/properties', function(){
  return view('my-properties');
});

Route::get('my-profile', function (){
    //$name = $user->name;
    return view('profile');
});
/*Route::get('/mailable', function () {
//    $property = Suuty\Property::find(171);
//    return new Suuty\Mail\SaveSearch($property);
  $message=
  Mail::raw('FCKING SEND', function($message)
  {
    $message->subject('Suuty Save Search Match!');
    $message->from('david@suuty.com', 'Suuty');
    $message->to('bnm4295@hotmail.com');
  });
});*/
Route::get('/home-buyer', function () {
    return view('resources-home-buyers');
});
Route::get('/home-owner', function () {
    return view('resources-home-owners');
});
Route::get('/service', function () {
    return view('service-providers');
});
Route::get('/questions', function () {
    return view('faq');
});
Route::get('/privacy', function () {
    return view('privacy');
});
Route::get('/terms-and-conditions', function () {
    return view('terms-of-use');
});
//$user = \Auth::user(); dd($user);
//Route::get('/properties', 'SearchController@filter');

//Route::post('/testing', function(){
//    dd(Input::all());
//});
//Route::get('/testing', 'PaymentController@payment');


Route::post('post-form', 'FormController@store')->name('forms.store');
//STRIPE
//check isset(get request), grab email of selected and stick it in description
Route::post ( 'payment-form', function (Request $request) {
    \Stripe\Stripe::setApiKey ( 'sk_live_z7QSbzJ6WwQavNDlkNRMd0Jh' );
    $id = Auth::id();
    $user = User::find($id);
    if($request->get('findemail') !== null ){
      $usersecond = User::find($request->get('findemail'));
      $email = $usersecond->email;
    }
    else{
      $email = "";
    }
    try {
        \Stripe\Charge::create ( array (
                "amount" => 990 * 100,
                "currency" => "cad",
                "source" => $request->input ( 'stripeToken' ), // obtained with Stripe.js
                "description" =>
                  "Home Buyer Email: " . $email . " and " . "Home Seller Email: " . $user->email,
        ) );
        Session::flash ( 'success-message', 'Payment done successfully !' );
        return Redirect::back ();
    } catch ( \Exception $e ) {
        Session::flash ( 'fail-message', "Error! Please Try again." );
        return Redirect::back ();
    }
} );

//RESOURCES
Route::DELETE('saves/{savesearch}', 'SaveSearchController@destroy')->name('savesearch.destroy');
Route::resource('payments','PaymentController');
Route::resource('offers', 'OfferController');
Route::resource('blogs', 'BlogController');
Route::resource('properties','PropertyController',
array('except'=> ['index', 'store', 'show'] )
);

Route::get('properties/{slug}', 'PropertyController@show')->name('properties.show');
Route::get('properties', 'PropertyController@index')->name('properties.index');
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

Route::group([
    'middleware' => 'web'
], function () {
    Route::get('email-verification/error', 'Auth\RegisterController@getVerificationError')
        ->name('email-verification.error');

    Route::get('email-verification/check/{token}', 'Auth\RegisterController@getVerification')
        ->name('email-verification.check');
});
