<?php

namespace App\Exceptions;

use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class TooManyRequestException extends Exception
{
    private $key;

    public function __construct($key){
        $this->key = $key;
    }
    public function render(Request $request){
        $availableIn=RateLimiter::availableIn($this->key);
        return response()->json([
            'status'=>'error',
            'message'=>'Too many requests',
            'availableIn'=>$availableIn,
            'status_code'=>429
        ],429);
    }
}
