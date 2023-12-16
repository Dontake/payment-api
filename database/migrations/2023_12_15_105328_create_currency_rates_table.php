<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('currency_rates', function (Blueprint $table) {
            $table->id();

            $table->foreignId('currency_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('exchange_id')->constrained(
                table: 'currencies', indexName: 'currency_rates_exchange_id'
            )->cascadeOnUpdate()->cascadeOnDelete();

            $table->integer('current_rate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currency_rates');
    }
};
