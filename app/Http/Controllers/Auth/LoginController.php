<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\Login;

use Auth;
use Captcha;
use DateTime;
use Carbon\Carbon;

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

    protected function validateLogin(Request $request)
    {
        $this->validate($request, [
            'username'  => 'required|string',
            'password'  => 'required|string',
            // 'captcha'   => 'required|captcha'
        ]); 
    }

    // insert data to table login
    public function sendLoginResponse(Request $request)
    {
        $login = new Login;
        $login->username_login  = Auth::user()->username;
        $login->sesi_login      = rand(100000, 999999) + time()+28800;
        $login->waktu_login     = Carbon::now();
        $login->waktu_logout    = new DateTime('2000-01-01 00:00:00');
        $login->ip_addr         = $request->ip();
        $login->status          = 'IN';
        $login->save();

        // for redirect
        return $this->authenticated($request, $this->guard()->user())
                ?: redirect()->intended($this->redirectPath());
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/cabang';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('guest', ['except' => 'logout']);
    }

    public function username(){
        return 'username';
    }

    public function refresh_captcha()
    {
        return captcha_img();
    }
}
