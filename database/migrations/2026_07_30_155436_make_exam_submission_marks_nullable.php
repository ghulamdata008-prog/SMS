<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('exam_submissions', function (Blueprint $table) {

        $table->integer('obtained_marks')->nullable()->change();

        $table->integer('total_marks')->nullable()->change();

        $table->string('result')->nullable()->change();

    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
