<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('teachers', function (Blueprint $table) {

            $table->string('phone',20)->nullable()->after('user_id');

            $table->string('qualification')->nullable()->after('phone');

            $table->text('address')->nullable()->after('qualification');

        });
    }

    public function down(): void
    {
        Schema::table('teachers', function (Blueprint $table) {

            $table->dropColumn([
                'phone',
                'qualification',
                'address'
            ]);

        });
    }
};