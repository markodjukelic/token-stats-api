<?php

namespace App\Actions;

use App\Models\TokenSnapshot;
use App\Repositories\EloquentTokenSnapshotRepository;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class TakeTokenSnapshotAction
{
    private EloquentTokenSnapshotRepository $repository;

    public function __construct(EloquentTokenSnapshotRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(): void
    {
        $response = Http::get('https://api.coinpaprika.com/v1/tickers',[
            'limit'=>50,
        ]);

        $tokens = $response->json();


        foreach($tokens as $token){
            $data = [
                'token_id'=> Arr::get($token,'id'),
                'symbol'=>Arr::get($token,'symbol'),
                'value_usd'=>Arr::get($token,'quotes.USD.price'),
                'last_snapshot'=>Carbon::now(),

            ];
            $this->repository->create($data);
        }
        }

}
