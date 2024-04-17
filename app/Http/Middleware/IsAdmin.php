<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; 

class IsAdmin

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
       
      
        if (!auth()->check() || !auth()->user()->isAdmin()) {
  
            return redirect()->route('posts.index')->with('error', 'Accès refusé. Seuls les administrateurs peuvent accéder à cette page.');
        }

        return $next($request);
    }
}


