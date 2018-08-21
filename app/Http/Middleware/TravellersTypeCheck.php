<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class TravellersTypeCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guest()){
            return redirect()->route('home');
        }
        $userType=Auth::user()->user_type;
        if($userType !== 'traveller'){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
