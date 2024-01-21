<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;



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
    protected $redirectTo = RouteServiceProvider::HOME;

    

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
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            // Check of de gebruiker minimaal 10 seconden is ingelogd
            $loginTime = now()->timestamp;
            $sessionLoginTime = $request->session()->get('login_time', 0);

            if ($loginTime - $sessionLoginTime >= 10) {
                // Verhoog het aantal logins in de sessie na een succesvolle login
                $request->session()->put('logins', $request->session()->get('logins', 0) + 1);

                // Update de login tijd in de sessie
                $request->session()->put('login_time', $loginTime);

                return $this->sendLoginResponse($request);
            } else {
                $this->guard()->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
            }
        }
        return $this->sendFailedLoginResponse($request);
    }
}
