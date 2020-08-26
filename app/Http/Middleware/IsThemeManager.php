<?php

namespace YourSPACE\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsThemeManager
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
        if(Auth::user() && Auth::user()->isThemeManager()) {
            return $next($request);
        }
        return redirect('/');
    }
}
