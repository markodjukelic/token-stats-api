<?php

namespace App\Console\Commands;

use App\Repositories\EloquentTokenRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;


class takeFirstTokens extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:take-first-tokens';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(EloquentTokenRepository $repository)
    {
        $response = Http::get('https://api.coinpaprika.com/v1/tickers',[
            'limit'=>50,
        ]);

        $tokens = $response->json();


        foreach($tokens as $token){
            $data = [
                'token_id'=> Arr::get($token,'id'),
                'name'=>Arr::get($token,'name'),
                'symbol'=>Arr::get($token,'symbol'),
                'value_usd'=>Arr::get($token,'quotes.USD.price'),
                'rank'=> Arr::get($token,'rank')
            ];

            $repository->create($data);
        }
    }
}
