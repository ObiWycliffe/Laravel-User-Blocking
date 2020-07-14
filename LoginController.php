<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Arr;

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

    // Custom logout redirect to login page addition
    public function logout(Request $request)
        {
            $this->guard()->logout();

            $request->session()->invalidate();

            return $this->loggedOut($request) ?: redirect('/login');
        }
    // Custom logout redirect to login page addition

    
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
        $this->middleware('guest')->except('logout');
    }



    // Checker For User Account Blocking
    protected function credentials(Request $request){
        $credentials = $request->only($this->username(), 'password'); // Getting data from user login form
        // dd($credentials);
        $array = \Arr::add($credentials, 'status', 0); // 0 Means user account is active|Not blocked (Any other number in $db means user cannot login/Is blocked)

        return $array; // Returns and passes user data to auth to allow for login and session
    }
}
