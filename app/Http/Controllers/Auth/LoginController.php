<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
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
    public function redirectTo() {
        $role = Auth::user()->role_id; 
        switch ($role) {
          case UserRole::ADMIN:
            return '/admin';
            break;
          case UserRole::USER:
            return '/homepage';
            break;
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
		public function logout() {
			Auth::logout();
			return redirect('/login');
		}
}