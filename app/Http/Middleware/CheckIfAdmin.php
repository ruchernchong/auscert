<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->isAdmin())
        {
            return $next($request);
        }

        return redirect()->action('HomeController@index')
            ->withErrors('You do not have permission to use this feature. If you believe this is an error, please contact support.');
    }
}
