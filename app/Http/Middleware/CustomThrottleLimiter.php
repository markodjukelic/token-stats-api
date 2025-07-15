<?php

namespace App\Http\Middleware;

use App\Exceptions\TooManyRequestException;
use Closure;
use Illuminate\Cache\RateLimiter;
use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Response;

class CustomThrottleLimiter
{
    protected RateLimiter $limiter;
    public function __construct(RateLimiter $limiter)
    {
        $this->limiter = $limiter;
    }

    public function handle(Request $request, Closure $next): Response
    {
        $key = $request->ip();



        if($this->limiter->tooManyAttempts($key,5)){

            Throw new TooManyRequestException($key);

        }
        $this->limiter->hit($key,60);


        return $next($request);
    }
}
