<?php

namespace App\Models\Transaction;

use App\Enums\Transaction\TransactionTypeEnum;
use App\Models\Currency\Currency;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $id;
 * @property int $user_id;
 * @property int $currency_id;
 * @property TransactionTypeEnum $type;
 * @property int $amount;
 * @property Carbon $created_at;
 * @property Carbon|null $updated_at;
 * @property Carbon|null $deleted_at;
 *
 * @property-read User $user;
 * @property-read Currency $currency;
 */
class Transaction extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'type' => TransactionTypeEnum::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function currency(): BelongsTo
    {
        return $this->belongsTo(Currency::class);
    }
}
