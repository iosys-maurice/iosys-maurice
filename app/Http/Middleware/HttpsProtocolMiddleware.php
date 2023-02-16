<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;

class HttpsProtocolMiddleware
{
    public function handle($request, Closure $next)
    {
	if($request->url() == route('tokengen.index'))
        {
            return $next($request); 
	}
            if (!$request->secure() && App::environment() === 'production') {
                return redirect()->secure($request->getRequestUri());
            }

            return $next($request); 
    }
}
