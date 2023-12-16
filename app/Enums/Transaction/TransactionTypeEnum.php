<?php

declare(strict_types=1);

namespace App\Enums\Transaction;

use App\Enums\EnumJsonSerializableTrait;

enum TransactionTypeEnum: string
{
    use EnumJsonSerializableTrait;

    case Debit = 'debit';
    case Credit = 'credit';
}
