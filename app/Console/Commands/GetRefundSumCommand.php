<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Repository\Transaction\TransactionRepository;
use Illuminate\Console\Command;

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
