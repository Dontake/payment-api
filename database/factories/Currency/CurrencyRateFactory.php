<?php

declare(strict_types=1);

namespace Database\Factories\Currency;

use App\Models\Currency\CurrencyRate;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<CurrencyRate>
 */
class CurrencyRateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'current_rate' => fake()->numberBetween(1, 100),
        ];
    }
}
