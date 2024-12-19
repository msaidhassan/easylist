<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceHttps
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the request is not secure (HTTP)
        if (!$request->secure()) {
            // Redirect to the HTTPS version of the request
            return redirect()->secure($request->getRequestUri());
        }

        return $next($request);
    }
}
