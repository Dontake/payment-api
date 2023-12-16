<?php

declare(strict_types=1);

namespace App\Models\Currency;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id;
 * @property int $currency_id;
 * @property int $exchange_id;
 * @property int $current_rate;
 * @property Carbon $created_at;
 * @property Carbon|null $updated_at;
 *
 * @property-read Currency $currency;
 * @property-read Currency $exchange;
 */
class CurrencyRate extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }

    public function exchange(): BelongsTo
    {
        return $this->belongsTo(Currency::class, 'exchange_id');
    }
}
