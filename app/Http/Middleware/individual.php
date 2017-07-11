<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\auth;
use Closure;

class Individual
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
        if($user->userType == 0)
        {
            return $next($request);
        }else
            return abort(403,'Unauthrized action.');
    }
}
