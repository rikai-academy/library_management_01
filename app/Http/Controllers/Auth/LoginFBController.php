<?php

namespace App\Http\Controllers\Auth;

use App\Enums\UserRole;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\LoginFBService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;


class LoginFBController extends Controller
{

    public function __construct()
    {
        $this->loginFBService = new LoginFBService; 
    }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $this->loginFBService->callback($provider);
        return redirect()->to('/');
    }
}
