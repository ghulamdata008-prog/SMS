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
    Schema::create('fees', function (Blueprint $table) {

        $table->id();

        $table->foreignId('student_id')
              ->constrained()
              ->cascadeOnDelete();

        $table->decimal('total_fee',10,2);

        $table->decimal('paid_fee',10,2)
              ->default(0);

        $table->decimal('remaining_fee',10,2);

        $table->date('due_date');

        $table->enum('status',[
            'Pending',
            'Partial',
            'Paid'
        ]);

        $table->timestamps();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
