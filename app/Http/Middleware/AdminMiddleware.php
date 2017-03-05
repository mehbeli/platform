<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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
        $admin = \Auth::user()->admin;
        if ($admin) {
            return $next($request);
        } else {
            return redirect('/')->with('info', 'Oops! You are not an admin');
        }

    }
}
