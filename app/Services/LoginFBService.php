<?php
namespace App\Services;

use App\Enums\UserRole;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

Class LoginFBService{
    
    private function login_fb($getInfo,$provider){
        $user = User::where('provider_id', $getInfo->id)->first();
        if (!$user) {
            $user = User::create([
                'name'     => $getInfo->name,
                'role_id'  => UserRole::USER,
                'email'    => $getInfo->email,
                'provider' => $provider,
                'provider_id' => $getInfo->id
            ]);
        }
        return $user;
    }
    
    public function callback($provider){
        $getInfo = Socialite::driver($provider)->user();
        $user = $this->login_fb($getInfo, $provider);
        auth()->login($user);
    }
}
