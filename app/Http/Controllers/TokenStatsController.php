<?php

namespace App\Http\Controllers;

use App\Exceptions\tokenException;
use App\Http\Resources\tokenResource;
use App\Models\token;
use App\Repositories\EloquentTokenRepository;


class TokenStatsController extends Controller
{
    public function all(EloquentTokenRepository $repository){
       return response()->json([
           'status'=>'success',
           'tokens'=> tokenResource::collection($repository->fetchAll())
           ]);
    }

    public function get(string $symbol,EloquentTokenRepository $repository){


        $symbol = strtoupper($symbol);

        $token = $repository->getBySymbol($symbol);


        if(!$token){
          throw new TokenException();
        }


        return response()->json([
            'status'=>'success',
            'token'=>new tokenResource($token)
        ]);
    }

    public function priceChange(string $symbol,EloquentTokenRepository $repository){
        $symbol = strtoupper($symbol);
        $token= $repository->getBySymbol($symbol);
        $changedPrice = $repository->priceChange($token);

        return response()->json([
            'status'=>'success',
            'currentPrice'=>$token->value_usd,
            'priceOneHourAgo'=>$changedPrice['priceOneHourAgo'],
            'changedPrice'=>$changedPrice['changedPrice'],

        ]);
    }
}
