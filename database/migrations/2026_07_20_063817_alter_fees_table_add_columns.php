<?php

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
        Schema::table('fees', function (Blueprint $table) {

            $table->foreignId('class_id')
                  ->after('student_id')
                  ->constrained('school_classes')
                  ->cascadeOnDelete();

            $table->string('fee_type')
                  ->after('class_id');

            $table->decimal('amount',10,2)
                  ->after('fee_type');

            $table->decimal('paid_amount',10,2)
                  ->default(0)
                  ->after('amount');

            $table->decimal('remaining_amount',10,2)
                  ->default(0)
                  ->after('paid_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('fees', function (Blueprint $table) {

            $table->dropForeign(['class_id']);

            $table->dropColumn([
                'class_id',
                'fee_type',
                'amount',
                'paid_amount',
                'remaining_amount',
            ]);
        });
    }
};