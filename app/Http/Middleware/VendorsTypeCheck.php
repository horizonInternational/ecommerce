<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VendorsTypeCheck
{

    public function handle($request, Closure $next)
    {
        if (Auth::guest()){
            return redirect()->route('home');
        }
        $userType=Auth::user()->user_type;
        if($userType !== 'vendor'){
            return redirect()->back();
        }
        return $next($request);
    }
}
