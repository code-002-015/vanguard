<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

use Validator;
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
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only(['email', 'password']))) {

            if(auth::user()->role_id == 6 || auth::user()->is_active == 0){ // block customers from using this login form
                Auth::logout();
                return back()->with('unauthorize-login', 'Unauthorize login.'); 
            }
        }
        
        return back()->with('error', __('auth.login.incorrect_input')); 

        // if (Auth::attempt($request->only(['email', 'password']))) {
        //     return $this->sendLoginResponse($request);
        // }

        // return back()->with('error', __('auth.login.incorrect_input'));
    }

    protected function redirectTo()
    {
        return route('dashboard');
    }

    protected function loggedOut(Request $request)
    {   
        if($request->roleid == 1) // this means that the admin was logged in.
        {
            $msg = Session::get('success');
            return redirect()->route('panel.login')->with('msg', $msg);
        }

        return redirect()->route('home');
    }
}
