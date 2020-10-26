<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class VerifyAdminMiddleware
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
        // if(auth()->user()->role!=='admin'){
        //     return redirect(route('home'));

        // }
        if(!auth()->user()->isAdmin()){
            return redirect(route('home'));
        }
        return $next($request);
    }
}
