<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Teller
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
        $role = Auth::user()->role;
        if ($role->name == 'Teller' || $role->name == 'Manager' || $role->name == 'Admin') {
            return $next($request);
        }
    }
}
