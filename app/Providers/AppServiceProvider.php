<?php

declare(strict_types=1);

namespace App\Providers;

use App\ExternalServices\Currency\CurrencyService;
use App\ExternalServices\Currency\CurrencyServiceInterface;
use App\Services\Balance\BalanceService;
use App\Services\Balance\BalanceServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        BalanceServiceInterface::class => BalanceService::class,
        CurrencyServiceInterface::class => CurrencyService::class
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
