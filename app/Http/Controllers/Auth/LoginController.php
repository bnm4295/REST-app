<?php

namespace Suuty\Http\Controllers\Auth;

use Suuty\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;

use Auth;

use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'userLogout'] ]);
    }

    public function userLogout()
    {
        Auth::guard('web')->logout();
        Session::flash('danger', 'Please check your email for verification.');
        return redirect('/');
    }
    public function maxAttempts()
    {
        Session::flash('maxAttempts', 'Please try again. Maximum attempts for login is four times');
        return property_exists($this, 'maxAttempts') ? $this->maxAttempts : 4;
    }
    public function decayMinutes()
    {
        return property_exists($this, 'decayMinutes') ? $this->decayMinutes : 30;
    }
}
