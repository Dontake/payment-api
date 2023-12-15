<?php

namespace App\Enums\Transaction;

use App\Enums\EnumJsonSerializableTrait;

enum TransactionTypeEnum: string
{
    use EnumJsonSerializableTrait;

    case Stock = 'stock';
    case Refund = 'refund';
}
