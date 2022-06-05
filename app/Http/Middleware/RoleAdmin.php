<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleAdmin
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();

        // Refactor
        return ($user && $user->role == 'Admin') ? $next($request) : redirect('/');

        // Tetep Bisa Juga
        // if ($user) {
        //     if ($user->role == 'Admin') {
        //         return $next($request);
        //     }
        // }
        // return redirect('/');
    }
}
