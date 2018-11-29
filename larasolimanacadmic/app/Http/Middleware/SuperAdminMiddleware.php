<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdminMiddleware
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
        if (\Auth::user() && \Auth::user()->admin == 'superadmin') {
            return $next($request);
        }
        return redirect('../');
        /*if ($request->user() && $request->user()->admin != 'superadmin'){
            return abort(404);
        }
        return $next($request);*/
    }
}
