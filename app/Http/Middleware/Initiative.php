<?php

namespace App\Http\Middleware;

use Closure;

class Initiative
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
        if($user->userType == 3)
        {
            return $next($request);
        }else
            return abort(403,'Unauthrized action.');
    }
}
