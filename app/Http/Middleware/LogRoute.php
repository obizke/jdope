<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Log;
use Closure;

class LogRoute
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
        return $next($request);
        if (App::environment('local')) {
            $log=[
                // 'URI'=>$request->getUri(),
                // 'METHOD'=>$request->getMethod(),
                // 'REQUEST_BODY'=>$request->all(),
                'RESPONSE'=>$response->getContent(),
            ];
            Log::info(json_encode($log));
        }
    }
}
