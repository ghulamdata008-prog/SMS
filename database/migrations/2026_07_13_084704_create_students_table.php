<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('name');

            $table->string('email')->unique();

            $table->string('phone',20);

            $table->text('address');

            // class_id first
            $table->foreignId('class_id')
                ->constrained('school_classes')
                ->cascadeOnDelete();

            // // section_id after class_id in PHP order
            // $table->foreignId('section_id')
            //     ->nullable()
            //     ->constrained('sections')
            //     ->nullOnDelete();

            $table->string('profile_image')->nullable();

            $table->boolean('status')->default(true);

            $table->softDeletes();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};