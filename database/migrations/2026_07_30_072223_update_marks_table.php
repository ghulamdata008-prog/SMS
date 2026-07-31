<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('marks', function (Blueprint $table) {

            // Add only new columns

            $table->foreignId('exam_id')
                ->nullable()
                ->after('id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('teacher_id')
                ->nullable()
                ->after('student_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('grade')
                ->nullable()
                ->after('total_marks');

            $table->string('status')
                ->default('Pass')
                ->after('grade');
        });
    }

    public function down(): void
    {
        Schema::table('marks', function (Blueprint $table) {

            $table->dropForeign(['exam_id']);
            $table->dropForeign(['teacher_id']);

            $table->dropColumn([
                'exam_id',
                'teacher_id',
                'grade',
                'status',
            ]);
        });
    }
};