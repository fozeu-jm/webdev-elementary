<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Http\RedirectResponse;


class Root {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if ($request->user()->role == 'root') {
            return $next($request);
        } else {
            return new RedirectResponse(url('accueil'));
        }
    }

}
