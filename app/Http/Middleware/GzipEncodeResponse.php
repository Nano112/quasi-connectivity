<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GzipEncodeResponse
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (in_array('gzip', $request->getEncodings()) && function_exists('gzencode')) {
            $response->setContent(gzencode($response->getContent(), 9));
            $response->headers->add([
                'Content-Encoding' => 'gzip',
                'X-Vapor-Base64-Encode' => 'True',
            ]);
        }
        return $response;
    }
}
