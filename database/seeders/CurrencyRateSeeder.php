<?php

namespace Database\Seeders;

use App\Enums\Currency\CurrencyNameEnum;
use App\Models\Currency\Currency;
use App\Models\Currency\CurrencyRate;
use Illuminate\Database\Seeder;

class CurrencyRateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies =  Currency::all();

        $currencies->each(function (Currency $currency) use ($currencies) {
            CurrencyRate::factory()->for($currency)
                ->state(['exchange_id' => $currencies->where('id', '!=', $currency->id)->first()->id])
                ->create();
        });
    }
}
