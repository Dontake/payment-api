<?php

declare(strict_types=1);

use App\Enums\Transaction\TransactionReasonEnum;
use App\Enums\Transaction\TransactionTypeEnum;
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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('currency_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();

            $table->enum('type', TransactionTypeEnum::values());
            $table->enum('reason', TransactionReasonEnum::values());
            $table->unsignedInteger('amount');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
