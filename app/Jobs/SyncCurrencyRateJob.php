<?php

declare(strict_types=1);

namespace App\Jobs;

use App\Exceptions\ExternalServices\CurrencyRateSyncException;
use App\Services\Currency\CurrencyRateService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SyncCurrencyRateJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     * @throws CurrencyRateSyncException
     */
    public function handle(CurrencyRateService $service): void
    {
        $service->sync();
    }
}
