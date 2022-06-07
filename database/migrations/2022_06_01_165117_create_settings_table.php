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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('website_name')->nullable();
            $table->string('logo')->nullable();
            $table->string('cover')->nullable();
            $table->string('address')->nullable();
            $table->string('bio')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('phone')->nullable();
//            $table->string('social_links')->nullable();
            $table->string('slogan_text')->nullable();
            $table->string('copy_right_text')->nullable();
            $table->string('main_color')->nullable();
            $table->string('secondary_color')->nullable();

            $table->string('phone2')->nullable();
            $table->string('whatsapp_phone')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->string('telegram_link')->nullable();
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
        Schema::dropIfExists('settings');
    }
};
