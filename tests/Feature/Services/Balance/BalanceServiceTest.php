<?php

declare(strict_types=1);

namespace Services\Balance;

use App\Enitites\Transaction\TransactionData;
use App\Enums\Transaction\TransactionReasonEnum;
use App\Enums\Transaction\TransactionTypeEnum;
use App\Services\Balance\BalanceService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BalanceServiceTest extends TestCase
{
    use RefreshDatabase;

    protected TransactionData $transactionData;
    protected BalanceService $balanceService;

    public function setUp(): void
    {
        parent::setUp();

        $this->balanceService = new BalanceService();

        $this->transactionData = new TransactionData(
            rand(1, 500),
            rand(1, 2),
            fake()->randomElement(TransactionTypeEnum::cases()),
            fake()->randomElement(TransactionReasonEnum::cases()),
            rand(1, 10)
        );
    }

    public function testUpdateBalanceOk(): void
    {
        $this->balanceService->update(rand(1, 10), $this->transactionData);

        $this->assertDatabaseHas('transactions', $this->transactionData->toArray());
    }
}
