<?php

namespace App\Services\Currency;

use App\Enitites\Currency\CurrencyRateData;
use App\Enums\Currency\CurrencyNameEnum;
use App\Exceptions\ExternalServices\CurrencyRateSyncException;
use App\ExternalServices\Currency\CurrencyServiceInterface;
use App\Repository\Currency\CurrencyRateRepository;
use App\Repository\Currency\CurrencyRepository;

class CurrencyRateService
{
    public function __construct(public CurrencyServiceInterface $service)
    {
    }

    /**
     * @throws CurrencyRateSyncException
     */
    public function sync(): void
    {
        /**
         * @var CurrencyRateData $item
         */
        foreach ($this->service->sync(CurrencyNameEnum::Usd) as $item) {
            $currency = CurrencyRepository::byName($item->currencyName);
            $exchange = CurrencyRepository::byName($item->exchangeName);

            CurrencyRateRepository::update($currency->id, $exchange->id, $item->rate);
        }
    }
}
