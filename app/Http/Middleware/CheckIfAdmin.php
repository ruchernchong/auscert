<?php

namespace App\Http\Middleware;

use Closure;

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
        if (auth()->check() && $request->user()->isSuperAdmin()) {
            return $next($request);
        }

        flash()->warning('You do not have permission to use this feature. If you believe this is an error, please contact support.');
        return redirect()->route('dashboard');
    }
}
