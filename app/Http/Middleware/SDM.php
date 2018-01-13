<?php

namespace App\Http\Middleware;

use Closure;

class SDM
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
        if(auth()->check() && auth()->user()->user_role === 3)
            return $next($request);
        else
            return redirect('/')->with('error', 'Anda tidak mempunyai akses ke halaman ini');
    }
}
