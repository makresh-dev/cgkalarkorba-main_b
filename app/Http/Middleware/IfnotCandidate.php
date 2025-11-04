<?php

namespace App\Http\Middleware;

use Closure;

class IfnotCandidate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = "candidate")
    {
        if(!auth()->guard($guard)->check())
        {
            return redirect(route('user.login'));
        }

        return $next($request);
    }
}
