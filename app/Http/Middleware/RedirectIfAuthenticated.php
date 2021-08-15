<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null) {
        if (Auth::guard($guard)->check()) {
          $role = Auth::user()->role_id; 
      
          switch ($role) {
            case UserRole::ADMIN:
            return '/admin';
            break;
            case UserRole::USER:
            return '/home';
            break; 
          }
        }
        return $next($request);
      }
}
