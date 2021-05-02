<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use RealRashid\SweetAlert\Facades\Alert;

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

    protected function redirectTo()
    {
        if(auth()->user()->role == 'admin')
        {
            return $this->redirectTo = route('admin.dashboard');
        } else {
            return $this->redirectTo = route('siswa.index');
        }
    }

    public function authenticated()
    {
        if(auth()->user()->role == 'admin')
        {
            Alert::success('Message Information', 'Selamat Datang Admin');
        } else {
            Alert::success('Message Information', 'Selamat Datang Siswa');
        }
    }

    public function username()
    {
        return 'username';
    }

    public function logout()
    {
        $this->guard()->logout();
        Alert::success('Message Information', 'Logout Sukses');
        return redirect()->route('login');
    }
}
