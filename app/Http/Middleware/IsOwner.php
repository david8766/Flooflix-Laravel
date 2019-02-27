<?php

namespace App\Http\Middleware;

use Closure;

class IsOwner
{
    /**
     * Guest redirection..
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->guest()){
            return redirect('/')->with('error', "Vous devez être connecté en tant que propriétaire du site pour voir cette page");
        }
        return $next($request);
    }
}
