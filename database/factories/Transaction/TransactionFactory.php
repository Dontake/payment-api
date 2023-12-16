<?php

declare(strict_types=1);

namespace Database\Factories\Transaction;

use App\Enums\Transaction\TransactionReasonEnum;
use App\Enums\Transaction\TransactionTypeEnum;
use App\Models\Transaction\Transaction;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->randomElement(TransactionTypeEnum::cases()),
            'reason' => fake()->randomElement(TransactionReasonEnum::cases()),
            'amount' => fake()->numberBetween(1, 10)
        ];
    }
}
