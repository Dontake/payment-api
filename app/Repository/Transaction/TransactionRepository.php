<?php

declare(strict_types=1);

namespace App\Repository\Transaction;

use App\Enitites\Transaction\TransactionData;
use App\Enums\Transaction\TransactionReasonEnum;
use App\Models\Transaction\Transaction;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TransactionRepository
{
    public static function create(TransactionData $data)
    {
        return Transaction::create($data->toArray());
    }

    public static function refundSum(): int
    {
        return (int) Transaction::query()
            ->where('reason', TransactionReasonEnum::Refund->value)
            ->whereDate('updated_at', '>', now()->subWeek())
            ->select(DB::raw('SUM(amount) as refund_amount'))
            ->first()->refund_amount;
    }
}
