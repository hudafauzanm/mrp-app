<?php

namespace App\Http\Middleware;

use Closure;

class Unit
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
        $user_role = auth()->user()->user_role;

        if(auth()->check() && ($user_role === 1 || $user_role === 3))
            return $next($request);
        else
            return redirect('/')->with('error', 'Anda tidak mempunyai akses ke halaman ini');
    }
}
