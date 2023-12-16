<?php

declare(strict_types=1);

namespace App\Http\Controllers\V1\User;

use App\Enitites\Transaction\TransactionData;
use App\Http\Controllers\V1\BaseController;
use App\Http\Requests\V1\User\Balance\UpdateBalanceRequest;
use App\Http\Resources\V1\Balance\BalanceResource;
use App\Services\Balance\BalanceServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class UserBalanceController extends BaseController
{
    /**
     * @throws ModelNotFoundException
     */
    public function info(int $walletId, BalanceServiceInterface $service): BalanceResource
    {
        return new BalanceResource($service->info($walletId));
    }

    public function update(int $walletId, UpdateBalanceRequest $request, BalanceServiceInterface $service): void
    {
        $service->update($walletId, TransactionData::from($request->all()));
    }
}
