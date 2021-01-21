<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function username(){
        return 'username';
    }

    public function login(Request $request)
    {
        error_log("called");
        $credentials = $request->only('username', 'password');
        if (Auth::guard('web')->attempt($credentials,$request)) {
            return response()->json([
                'id' => Auth::user()->id,
                'namaLengkap' => Auth::user()->nama_lengkap,
                'username' => Auth::user()->username,
                'role' => Auth::user()->role
            ]);
        }else{
            return abort(401);
        }
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
