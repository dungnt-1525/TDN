<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

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
        if (Sentinel::check()) {
            if (Sentinel::getUser()->inRole('admin')) {
                return $next($request);
            }

            return redirect()->route('login')->withErrors(__('You must enter a login'));
        }

        return redirect()->route('login')->withErrors(__('You must enter a login'));
    }
}
