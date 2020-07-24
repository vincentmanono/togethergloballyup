<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminOnly
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
        if (Auth::check() ) {
            if (auth()->user()->role == 'admin' ) {
                return $next($request);
            } else {
                Session::flash('error', "You do not have privilagies to access, this routes");
                return back() ;
            }

        } else {
            Session::flash('error', "Please login to access this routes");
            return back() ;
        }


    }
}
