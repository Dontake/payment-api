<?php

namespace App\ExternalServices\Currency;

use App\Enitites\Currency\CurrencyRateData;
use App\Enums\Currency\CurrencyNameEnum;
use App\Exceptions\ExternalServices\CurrencyRateSyncException;
use App\ExternalServices\Clients\ExchangeratesClient;

class CurrencyService implements CurrencyServiceInterface
{
    public function __construct(protected ExchangeratesClient $client)
    {
    }

    /**
     * @throws CurrencyRateSyncException
     */
    public function sync(CurrencyNameEnum $base): array
    {
        try {
            $result = $this->client->latest($base, strtoupper(implode(', ', CurrencyNameEnum::getAvailable())));
        } catch (\Throwable $e) {
            throw new CurrencyRateSyncException($e->getMessage());
        }

        $rates = [];

        foreach ($result->rates as $currency => $rate) {
            $rates[] = new CurrencyRateData(
                strtolower($currency),
                strtolower($result->base),
                $rate
            );
        }

        return $rates;
    }
}
