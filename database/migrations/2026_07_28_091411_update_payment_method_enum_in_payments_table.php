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
    Schema::table('payments', function ($table) {

        $table->enum('payment_method',[
            'Cash',
            'Card',
            'Bank',
            'Stripe',
            'Monnify'
        ])->change();

    });
}

    /**
     * Reverse the migrations.
     */
   public function down()
{
    Schema::table('payments', function ($table) {

        $table->enum('payment_method',[
            'Cash',
            'Card',
            'Bank'
        ])->change();

    });
}
};
