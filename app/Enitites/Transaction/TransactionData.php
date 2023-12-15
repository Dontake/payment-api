<?php

namespace App\Enitites\Transaction;

use App\Enums\Transaction\TransactionReasonEnum;
use App\Enums\Transaction\TransactionTypeEnum;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;

/**
 * @property int $userId
 * @property int $currencyId
 * @property TransactionTypeEnum $type
 * @property TransactionReasonEnum $reason
 * @property int $amount
 */
class TransactionData extends Data
{
    public function __construct(
        #[MapOutputName('user_id')]
        public int $userId,
        #[MapOutputName('currency_id')]
        public int $currencyId,
        public TransactionTypeEnum $type,
        public TransactionReasonEnum $reason,
        public int $amount
    ) {
    }

    public function getAmount(): int
    {
        return $this->type === TransactionTypeEnum::Credit ? -$this->amount : $this->amount;
    }
}
