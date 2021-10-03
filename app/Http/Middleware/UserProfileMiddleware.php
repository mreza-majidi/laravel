<?php

 namespace App\Http\Middleware;

 use Closure;
 use Illuminate\Http\Request;

class UserProfileMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     *
    * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if (auth()->check()) {
            if ($user->isEmailVerified()) {
                if (!$user->getIsCompleted()) {
                    return redirect()->route('website.web.user.profile.show');
                }
            }

            return $next($request);
        }

        return $next($request);
    }
}
