<?php

declare(strict_types=1);

namespace App\Http\Resources\V1\Balance;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BalanceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'balance' => $this->balance / 100,
            'currency' => $this->currency->name->value
        ];
    }
}
