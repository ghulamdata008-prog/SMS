<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('marks', function (Blueprint $table) {

            $table->integer('total_marks')->after('subject_id');

            $table->renameColumn('marks', 'obtained_marks');

        });
    }

    public function down(): void
    {
        Schema::table('marks', function (Blueprint $table) {

            $table->renameColumn('obtained_marks', 'marks');

            $table->dropColumn('total_marks');

        });
    }
};