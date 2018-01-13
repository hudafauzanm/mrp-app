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
        if(auth()->check() && auth()->user()->user_role === 1)
            return $next($request);
        else
            return redirect('/')->with('error', 'Anda tidak mempunyai akses ke halaman ini');
    }
}
