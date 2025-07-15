<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;


class TokenException extends Exception
{
  public function render(Request $request){
      return response()->json([
          'status'=>'error',
          'message'=>'token not found',
          'status_code'=>404
      ],404);
  }
}
