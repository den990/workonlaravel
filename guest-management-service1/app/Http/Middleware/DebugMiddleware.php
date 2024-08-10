<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DebugMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $startTime = microtime(true);
        $startMemory = memory_get_usage();

        $response = $next($request);

        $endTime = microtime(true);
        $endMemory = memory_get_usage();

        $response->headers->set('X-Debug-Time', round(($endTime - $startTime) * 1000, 2) . ' ms');
        $response->headers->set('X-Debug-Memory', round(($endMemory - $startMemory) / 1024, 2) . ' KB');

        return $response;
    }
}
