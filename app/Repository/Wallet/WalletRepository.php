<?php

declare(strict_types=1);

namespace App\Repository\Wallet;

use App\Models\Wallet\Wallet;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class WalletRepository
{
    /**
     * @throws ModelNotFoundException
     */
    public static function find(int $id): Wallet
    {
        return Wallet::query()->with('currency')->lockForUpdate()->findOrFail($id);
    }

    public static function exists(int $id): bool
    {
        return Wallet::query()->where('id', $id)->lockForUpdate()->exists();
    }

    public static function updateBalance(int $walletId, int $amount): bool
    {
        return (bool) Wallet::query()->where('id', $walletId)->increment('balance', $amount);
    }
}
