<?php

namespace App\Http\Middleware;

use Closure;

class CorsMiddleware
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
        $headers = [
            'Access-Control-Allow-Origin' =>  '*',
            'Access-Control-Allow-Methods' => 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers' => 'Content-Type, Accept, Authorization, X-Requested-With, Application, token'
        ];

        if ($request->isMethod('OPTIONS')) {
            return response()->json(["response" => "ok"], 200, $headers);
        }

        $response = $next($request);
        foreach($headers as $key => $header){
            $response->headers->set($key, $header);
        }


        return $response;
    }
}
