<?php

namespace App\Repositories;


use App\Contracts\TokenRepositoryInterface;
use App\Models\token;
use App\Models\TokenSnapshot;
use Carbon\Carbon;


class EloquentTokenRepository implements TokenRepositoryInterface
{
    public function create(array $data): void
    {
        Token::create($data);
    }

    public function fetchAll()
    {
       return Token::orderBy('rank','asc')->get();
    }

    public function update(token $token, array $data): void
    {
       $token->update($data);
    }

    public function getBySymbol(string $symbol): Token
    {
       return Token::where('symbol',$symbol)->first();
    }

    public function priceChange(Token $token){
        $hourAgo = Carbon::now()->subHours(1);
        $priceToken = $token->value_usd;
        $tokenOneHourAgo = TokenSnapshot::where('token_id',$token->token_id)
            ->where('last_snapshot','<=',$hourAgo)
            ->orderBy('last_snapshot','desc')
            ->first();
        $priceOneHourAgo=$tokenOneHourAgo->value_usd;
        $changedPrice = $priceToken - $priceOneHourAgo;
        $data=[
            'changedPrice'=>$changedPrice,
            'priceOneHourAgo'=>$priceOneHourAgo
        ];

        return $data;
    }


}
