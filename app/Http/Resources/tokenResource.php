<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class tokenResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'token_id'=>$this->token_id,
            'name'=>$this->name,
            'symbol'=>$this->symbol,
            'value_usd'=>$this->value_usd,
            'rank'=>$this->rank
        ];
    }
}
