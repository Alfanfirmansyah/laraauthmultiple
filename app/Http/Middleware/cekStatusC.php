<?php

namespace App\Http\Middleware;

use Closure;

class CekStatusC
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
        if (auth()->check() && $request->user()->role == 'admin'){
			return redirect()->guest('/home');
		}
        return $next($request);
    }
}