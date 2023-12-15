<?php

namespace Database\Factories\Currency;

use App\Enums\Currency\CurrencyNameEnum;
use App\Models\Currency\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Currency>
 */
class CurrencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => CurrencyNameEnum::Rub,
        ];
    }

    /**
     * Indicate that the model's name is usd.
     *
     * @return Factory
     */
    public function usd(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => CurrencyNameEnum::Usd,
            ];
        });
    }
}
