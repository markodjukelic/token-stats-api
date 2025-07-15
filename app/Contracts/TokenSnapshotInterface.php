<?php

namespace App\Contracts;

interface TokenSnapshotInterface
{
   public function create(array $data):void;
}
