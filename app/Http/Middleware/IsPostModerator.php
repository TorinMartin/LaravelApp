<?php

namespace YourSPACE\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsPostModerator
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
        if(Auth::user() && Auth::user()->isPostModerator()) {
            return $next($request);
        }

        return redirect('/');
    }
}
