<?php

namespace App\Services\Balance;

use App\Enitites\Transaction\TransactionData;
use App\Enums\Transaction\TransactionTypeEnum;
use App\Exceptions\Api\V1\InsufficientFundsException;
use App\Models\Wallet\Wallet;
use App\Repository\Transaction\TransactionRepository;
use App\Repository\Wallet\WalletRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BalanceService implements BalanceServiceInterface
{
    /**
     * @throws ModelNotFoundException
     */
    public function info(int $walletId): Wallet
    {
        return WalletRepository::find($walletId);
    }

    /**
     * @throws ModelNotFoundException
     */
    public function update(int $walletId, TransactionData $data): void
    {
        Cache::lock($data->userId . $walletId)->get(function () use ($walletId, $data) {
            $wallet = WalletRepository::find($walletId);

            if ($this->checkBalance($wallet->balance, $data)) {
                Log::alert('Transaction fail! With data:', $data->toArray());
                throw new InsufficientFundsException();
            }

            DB::transaction(function () use ($walletId, $data) {
                WalletRepository::updateBalance($walletId, $data->getAmount());
                TransactionRepository::create($data);
            });

            Log::info('Transaction success! With data:', $data->toArray());
        });
    }

    protected function checkBalance(int $balance, TransactionData $data): bool
    {
        return $data->type === TransactionTypeEnum::Credit && ($balance - $data->amount) < 0;
    }
}
