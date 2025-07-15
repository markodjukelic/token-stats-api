<?php

namespace App\Contracts;

use App\Collections\TokenCollection;
use App\Models\token;

interface TokenRepositoryInterface
{
   public function create(array $data):void;

   public function fetchAll();
   public function update(Token $token, array $data):void;
   public function getBySymbol(string $symbol):Token;
   public function priceChange(Token $token);





}
