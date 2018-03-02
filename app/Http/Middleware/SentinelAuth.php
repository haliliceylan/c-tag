<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;

class SentinelAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $handle)
    {
        if ($handle == "auth") {
            if (Sentinel::check()) {
                return $next($request);
            }
            return redirect()->route('admin.login');
        } elseif ($handle == "guest") {
            if (Sentinel::check()) {
                return redirect()->route('admin.index');
            }
            return $next($request);
        }
    }
}
