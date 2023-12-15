<?php

namespace App\Enums\Transaction;

use App\Enums\EnumJsonSerializableTrait;

enum TransactionReasonEnum: string
{
    use EnumJsonSerializableTrait;

    case Stock = 'stock';
    case Refund = 'refund';
}
