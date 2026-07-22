<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {

            $table->foreignId('student_id')
                  ->after('fee_id')
                  ->constrained()
                  ->cascadeOnDelete();

            $table->string('payment_gateway')
                  ->nullable()
                  ->after('payment_method');

            $table->string('currency')
                  ->default('PKR');

            $table->enum('payment_status',[
                'Pending',
                'Paid',
                'Failed',
                'Refunded'
            ])->default('Pending');

            $table->string('reference_no')
                  ->nullable();

            $table->text('notes')
                  ->nullable();

        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {

            $table->dropForeign(['student_id']);

            $table->dropColumn([
                'student_id',
                'payment_gateway',
                'currency',
                'payment_status',
                'reference_no',
                'notes'
            ]);

        });
    }
};