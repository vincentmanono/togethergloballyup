<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Auth;

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
                $request->session()->flash('error', "You do not have privilagies to access, this routes");
                return back() ;
            }

        } else {
            $request->session()->flash('error', "Please login to access this routes");
            return back() ;
        }


    }
}
