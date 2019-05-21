<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            return redirect('/cabang');
        }

        return $next($request);

        if($request->input('_token'))
        {
            if ( \Session::getToken() != $request->input('_token'))
            {
                return redirect()->guest('/')->with('global', 'Expired token found. Redirecting to /');
            }
        }
        return parent::handle($request, $next);
    }
}
