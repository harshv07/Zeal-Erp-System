<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Chat
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        // dd($user->getAllPermissions()->toArray());

        // if ($user->hasPermissionTo('show_chat') || $user->hasRole('SuperAdmin')) {
        //     return $next($request);
        // } else {
        //     abort('403');
        // }

        return $next($request);
    }
}
