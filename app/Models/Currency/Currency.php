<?php

declare(strict_types=1);

namespace App\Models\Currency;

use App\Enums\Currency\CurrencyNameEnum;
use App\Models\User;
use App\Models\Wallet\Wallet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * @property int $id;
 * @property CurrencyNameEnum $name;
 *
 * @property-read Wallet[]|Collection $wallets;
 * @property-read CurrencyRate[]|Collection $rates;
 */
class Currency extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $guarded = ['id'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'name' => CurrencyNameEnum::Class,
    ];

    public function wallets(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function rates(): HasMany
    {
        return $this->hasMany(CurrencyRate::class);
    }
}
