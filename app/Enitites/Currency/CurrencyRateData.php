<?php

declare(strict_types=1);

namespace App\Enitites\Currency;

use Spatie\LaravelData\Data;

class CurrencyRateData extends Data
{
    public function __construct(
        public string $currencyName,
        public string $exchangeName,
        public int $rate
    ) {
    }
}
