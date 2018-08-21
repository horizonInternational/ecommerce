<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminsTypeCheck
{

    public function handle($request, Closure $next)
    {
        if (Auth::guest()){
            return redirect()->route('login');
        }
        $userType=Auth::user()->user_type;
        if($userType !== 'admin'){
            return redirect()->back();
        }
        return $next($request);
    }
}
