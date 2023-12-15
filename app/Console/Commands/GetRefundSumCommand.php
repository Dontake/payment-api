<?php

namespace App\Console\Commands;

use App\Enums\Transaction\TransactionReasonEnum;
use App\Jobs\SyncCurrencyRateJob;
use App\Models\Transaction\Transaction;
use App\Repository\Transaction\TransactionRepository;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class GetRefundSumCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-refund-sum';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get refund sum by last week';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        dump(TransactionRepository::refundSum());
    }
}
