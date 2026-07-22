<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {

            $table->id();

            $table->foreignId('payment_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('transaction_no')->unique();

            $table->string('gateway');

            $table->string('reference_no')->nullable();

            $table->decimal('amount',10,2);

            $table->string('currency')->default('PKR');

            $table->enum('status',[
                'Pending',
                'Success',
                'Failed',
                'Refunded'
            ])->default('Success');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};