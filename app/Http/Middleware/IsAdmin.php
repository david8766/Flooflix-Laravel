<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    /**
     * Guest redirection.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->guest()){
            return redirect('/admin')->with('error', "Vous devez être connecté en tant qu'administrateur pour voir cette page");
        }
        return $next($request);
    }
}