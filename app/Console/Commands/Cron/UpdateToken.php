<?php

namespace App\Console\Commands\Cron;

use App\Jobs\updateTokenStatsJob;
use App\Repositories\EloquentTokenRepository;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class UpdateToken extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-token';

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
        $tokens = $repository->fetchAll();

        foreach ($tokens as $token) {
            dispatch(new updateTokenStatsJob($token));
        }
    }
}
