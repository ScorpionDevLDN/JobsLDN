<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_settings', function (Blueprint $table) {
            $table->double('price')->nullable();
            $table->string('support_by')->nullable();
            $table->string('paypal_logo')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('payment_settings', function (Blueprint $table) {
            //
        });
    }
};
