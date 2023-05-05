<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailVertificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_vertifications', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('entity_id');
            $table->string('entity_type');
            $table->string('expire_on');
            $table->enum('status', ['pending', 'expired'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_vertifications');
    }
}
