<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureEmailIsVerified
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->email_verified_at === null) {
            return redirect('/verify-email')->with('warning', 'Please verify your email before continuing.');
        }

        return $next($request);
    }
}
