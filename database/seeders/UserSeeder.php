<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Currency\Currency;
use App\Models\User;
use App\Models\Wallet\Wallet;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(CurrencySeeder::class);

        Currency::all()->each(function (Currency $currency) {
            $this->seedWallets($currency);
        });
    }

    protected function seedWallets(Currency $currency): void
    {
        Wallet::factory()->for($currency)
            ->count(500)->create()->each(function (Wallet $wallet) use ($currency) {
                User::factory()->for($wallet)
                    ->hasTransactions(10, function (array $attributes, User $user) use ($currency) {
                        return ['user_id' => $user->id, 'currency_id' => $currency->id];
                    })->create();
            });
    }
}
