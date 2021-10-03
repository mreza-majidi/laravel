<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckIfEmailIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $user = \Auth::user();
        if (auth()->check()) {
            if (!$user->isEmailVerified()) {
                return redirect()->route('website.web.auth.verification.index');
            }

            return $next($request);
        }

        return redirect()->route('website.web.user.auth');
    }
}
