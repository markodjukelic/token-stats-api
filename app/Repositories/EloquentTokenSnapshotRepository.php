<?php

namespace App\Repositories;

use App\Contracts\TokenSnapshotInterface;
use App\Models\TokenSnapshot;

class EloquentTokenSnapshotRepository implements TokenSnapshotInterface
{
    public function create(array $data): void
    {
      TokenSnapshot::create($data);
    }

}
