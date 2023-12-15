<?php

namespace App\ExternalServices\Currency;

use App\Enums\Currency\CurrencyNameEnum;
use App\Exceptions\ExternalServices\CurrencyRateSyncException;

interface CurrencyServiceInterface
{
    /**
     * @throws CurrencyRateSyncException
     */
    public function sync(CurrencyNameEnum $base): array;
}
