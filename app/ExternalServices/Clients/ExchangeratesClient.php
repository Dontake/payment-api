<?php

declare(strict_types=1);

namespace App\ExternalServices\Clients;

use App\Enums\Currency\CurrencyNameEnum;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class ExchangeratesClient
{
    protected string $token;
    protected string $url;

    public function __construct()
    {
        $this->token = config('exchangerates.token');
        $this->url = config('exchangerates.url');
    }

    /**
     * @throws RequestException
     */
    public function latest(CurrencyNameEnum $base, string $currencies): ?object
    {
        return Http::baseUrl($this->url)->get('latest', [
            'access_key' => $this->token,
            'base' => strtoupper($base->value),
            'symbols' => $currencies
        ])
            ->throw()
            ->object();
    }
}
