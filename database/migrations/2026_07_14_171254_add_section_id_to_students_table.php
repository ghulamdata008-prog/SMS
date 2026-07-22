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
    if (!Schema::hasColumn('students', 'section_id')) {
    Schema::table('students', function (Blueprint $table) {

        $table->foreignId('section_id')
              ->after('class_id')
              ->constrained('sections')
              ->cascadeOnDelete();

    });
}
}

public function down(): void
{
    if (Schema::hasColumn('students', 'section_id')) {

        Schema::table('students', function (Blueprint $table) {
            $table->dropForeign(['section_id']);
            $table->dropColumn('section_id');
        });

    }
}
};
