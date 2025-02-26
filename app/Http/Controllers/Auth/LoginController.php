<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    public function redirectTo() {
       if(Auth::user()->hasRole(1)){
        return '/admin_dashboard';
       }

       elseif(Auth::user()->hasRole(2)){
        return '/agent_dashboard';
       }

       elseif(Auth::user()->hasRole(3)){
        return '/liasonperson_dashboard';
       }

       elseif(Auth::user()->hasRole(4)){
        return '/client_dashboard';
       }

       else{
        return '/';
       }

      }
    //protected $redirectTo = RouteServiceProvider::HOME;

    // protected function authenticated($request, $user){
    //     if($user->hasRole('admin')){
    //         return redirect('/admin/dashboard');
    //     } else if($user->hasRole('agent')) {
    //         return redirect('/agent/dashboard');
    //     }else{
    //         redirect('/home');
    //     }
    // }

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
