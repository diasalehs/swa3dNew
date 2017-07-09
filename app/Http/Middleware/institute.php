<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\auth;
use Closure;

class institute
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
        $user = Auth::user();
        if($user->userType != 1){
            return $next($request);
        }
        return redirect()->route('home');
        
    }
}
