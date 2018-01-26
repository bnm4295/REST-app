<?php

namespace Suuty\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Jrean\UserVerification\Exceptions\UserNotVerifiedException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if($exception instanceof UserNotVerifiedException){
           return redirect('user/logout');
           //return response()->view('errors.require-verified', [], 401);
        }
        return parent::render($request, $exception);
    }
    /**
        * Convert an authentication exception into a response.
        *
        * @param  \Illuminate\Http\Request  $request
        * @param  \Illuminate\Auth\AuthenticationException  $exception
        * @return \Illuminate\Http\Response
        */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
       if($request->expectsJson()){
         return response()->json(['error' => 'Unauthenticated.'], 401);
       }
       $guard = array_get($exception->guards(),0);
       //dd($guard);
       switch($guard){
         case 'admin':
           $login = 'admin.login';
           break;

         default:
           $login = 'login';
           break;
       }

       return redirect()->guest(route($login));
    }
}
