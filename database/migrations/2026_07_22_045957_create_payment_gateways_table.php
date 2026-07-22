<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_gateways', function (Blueprint $table) {

            $table->id();

            $table->string('gateway');

            $table->string('client_id')->nullable();

            $table->text('secret_key')->nullable();

            $table->text('publishable_key')->nullable();

            $table->string('contract_code')->nullable();

            $table->string('webhook_secret')->nullable();

            $table->string('currency')->default('PKR');

            $table->enum('environment',[
                'Sandbox',
                'Live'
            ])->default('Sandbox');

            $table->boolean('status')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_gateways');
    }
};