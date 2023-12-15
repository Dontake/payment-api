<?php

namespace App\Enums\Currency;

use App\Enums\EnumJsonSerializableTrait;

enum CurrencyNameEnum: string
{
    use EnumJsonSerializableTrait;

    case Usd = 'usd';
    case Rub = 'rub';
}
