<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Currency\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 2; $i++) {
            $currency = $i % 2
                ? Currency::factory()
                : Currency::factory()->usd();

            $currency->create();
        }
    }
}
