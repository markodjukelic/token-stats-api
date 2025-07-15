<?php

namespace App\Actions;

use App\Models\token;
use App\Repositories\EloquentTokenRepository;
use Illuminate\Support\Facades\Http;

class UpdateTokensStatsAction
{
    private EloquentTokenRepository $repository;

    public function __construct(EloquentTokenRepository $repository){
        $this->repository = $repository;
    }
    public function execute(Token $token)
    {
        $response = Http::get("https://api.coinpaprika.com/v1/tickers/{$token->token_id}");

            if ($response->successful()) {
                $data = $response->json();

                $updatedData = [
                    "token_id" => $data['id'],
                    "name" => $data['name'],
                    "symbol" => $data['symbol'],
                    "value_usd" => $data['quotes']['USD']['price'],
                    "rank" => $data['rank'],

                ];
                $this->repository->update($token, $updatedData);
            }
        }

}
