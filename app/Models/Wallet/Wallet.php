<?php

declare(strict_types=1);

namespace App\Models\Wallet;

use App\Models\Currency\Currency;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id;
 * @property int $currency_id;
 * @property int $balance;
 * @property Carbon $created_at;
 * @property Carbon|null $updated_at;
 * @property Carbon|null $deleted_at;
 *
 * @property-read User $user;
 * @property-read Currency $currency;
 */
class Wallet extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function user(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }
}
