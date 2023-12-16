<?php

declare(strict_types=1);

namespace App\Services\Balance;

use App\Enitites\Transaction\TransactionData;
use App\Models\Wallet\Wallet;
use Illuminate\Database\Eloquent\ModelNotFoundException;

interface BalanceServiceInterface
{
    /**
     * @throws ModelNotFoundException
     */
    public function info(int $walletId): Wallet;

    public function update(int $walletId, TransactionData $data);
}
