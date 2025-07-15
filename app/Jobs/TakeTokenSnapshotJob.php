<?php

namespace App\Jobs;

use App\Actions\TakeTokenSnapshotAction;
use App\Models\TokenSnapshot;
use App\Repositories\EloquentTokenSnapshotRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class TakeTokenSnapshotJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */

    public function __construct(){}



    /**
     * Execute the job.
     */
    public function handle(TakeTokenSnapshotAction $action): void
    {
        $action->execute();
    }
}
