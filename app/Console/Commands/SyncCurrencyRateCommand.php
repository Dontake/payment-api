<?php

namespace App\Console\Commands;

use App\Enums\Transaction\TransactionReasonEnum;
use App\Jobs\SyncCurrencyRateJob;
use App\Models\Transaction\Transaction;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

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
