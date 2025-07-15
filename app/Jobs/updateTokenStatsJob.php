<?php

namespace App\Jobs;

use App\Actions\updateTokensStatsAction;
use App\Models\token;
use App\Repositories\EloquentTokenRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class updateTokenStatsJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public Token $token;




    public function __construct(Token $token)
    {
        $this->token = $token;
    }

    /**
     * Execute the job.
     */
    public function handle(UpdateTokensStatsAction $action): void
    {
        $action->execute($this->token);
    }
}
