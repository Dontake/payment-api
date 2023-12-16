<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Jobs\SyncCurrencyRateJob;
use Illuminate\Console\Command;

class SyncCurrencyRateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-currency-rate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sync currency rates with ';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        SyncCurrencyRateJob::dispatch();
    }
}
