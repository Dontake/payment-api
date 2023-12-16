<?php

declare(strict_types=1);

namespace Database\Factories\Wallet;

use App\Models\Wallet\Wallet;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Wallet>
 */
class WalletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'balance' => fake()->numberBetween(10, 1000000),
        ];
    }
}
