<?php

declare(strict_types=1);

namespace App\Repository\Currency;

use App\Enums\Currency\CurrencyNameEnum;
use App\Models\Currency\Currency;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CurrencyRepository
{
    /**
     * @@throws ModelNotFoundException
     */
    public static function byName(CurrencyNameEnum $name): Currency
    {
        return Currency::query()->where('name', $name->value)->firstOrFail();
    }

    public static function all(): Collection
    {
        return Currency::all();
    }
}
