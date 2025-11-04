<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class StatusMiddleware
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

        // dd(Auth::user());
        if (Auth::check() && Auth::user()->status == 'Inactive') 
        {
            Auth::logout();
            toastr()->error('Your profile not activeted try again thank you.');
            return redirect('/');
        }

        return $next($request);
    }
}
