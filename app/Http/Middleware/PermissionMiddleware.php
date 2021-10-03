<?php

namespace App\Http\Middleware;

use App\Constants\RoleConstants;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class PermissionMiddleware
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
        if (\auth()->check()) {
            /** @var User $user */
            $user = \auth()->user();
            // super admin is allowed to do any action
            if ($user->hasRole(RoleConstants::SUPER_ADMIN)) {
                return $next($request);
            }
            if ($user->hasPermissions($request->route()->getActionName())) {
                return $next($request);
            }

            abort(403);
        } else {
            return redirect()->route('login');
        }
    }
}
