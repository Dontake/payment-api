<?php

declare(strict_types=1);

namespace App\Enums\Currency;

use App\Enums\EnumJsonSerializableTrait;

enum CurrencyNameEnum: string
{
    use EnumJsonSerializableTrait;

    case Usd = 'usd';
    case Rub = 'rub';

    public static function getAvailable(): array
    {
        return [
            self::Rub->value
        ];
    }
}
