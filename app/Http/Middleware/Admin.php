<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\RedirectResponse;


class Admin
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
        if ($request->user()->role=='admin')
        {
            return $next($request);
        }
        return new RedirectResponse(url('/accueil'));
    }
}
