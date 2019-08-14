<?php

namespace App\Http\Middleware;

use Closure;

class CORS
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
      $domains = ['http://localhost:3000'];

        if (isset($request->server()['HTTP_ORIGIN'])) {
            $orgin = $request->server()['HTTP_ORIGIN'];
            if (in_array($orgin, $domains)) {
                header('Access-Control-Allow-Origin: ' . $orgin);
                header('Access-Control-Allow-Methods', 'GET, POST, PUT, PATCH,OPTION, DELETE, OPTIONS');
                header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization');
            }
        }
        return $next($request);

    }
}
