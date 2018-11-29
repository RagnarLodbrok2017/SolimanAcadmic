<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
            if (\Auth::user() && \Auth::user()->admin == 'admin') {
                return $next($request);
            }
            return redirect('../');
        /*if (Auth::guard($guard)->check()) {
            if ($request->user() && $request->user()->admin != 'admin'){
                return abort(404);
                }
        }
        else {
             return $next($request);
        }*/
    }
}
