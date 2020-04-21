<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    //protected $redirectTo = '/home';

    protected function authenticated($request, $user)
    {
        if($user->id == 3) {
            // return redirect()->intended('pesan-tiket');
            $request->session()->put('user', 'admin');
            return redirect()->intended('admin-home');
        }
        // return redirect()->intended('unggah-pembayaran');
        $request->session()->put('user', 'ticketing');
        return redirect()->intended('ticketing');

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
