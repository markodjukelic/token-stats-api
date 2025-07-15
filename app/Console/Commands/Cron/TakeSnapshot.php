<?php

namespace App\Console\Commands\Cron;

use App\Jobs\TakeTokenSnapshotJob;
use App\Repositories\EloquentTokenRepository;
use App\Repositories\EloquentTokenSnapshotRepository;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class TakeSnapshot extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:take-snapshot';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle(EloquentTokenSnapshotRepository $repository)
    {
       dispatch(new TakeTokenSnapshotJob());
    }
}
