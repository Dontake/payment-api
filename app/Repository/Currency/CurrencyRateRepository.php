<?php

namespace App\Repository\Currency;

use App\Enitites\Currency\CurrencyRateData;
use App\Models\Currency\CurrencyRate;

class CurrencyRateRepository
{
    public static function update(int $currencyId, int $exchangeId, int $rate): void
    {
        CurrencyRate::query()->where('currency_id', $currencyId)
            ->where(['exchange_id', $exchangeId])
            ->update(['current_rate' => $rate]);
    }
}
