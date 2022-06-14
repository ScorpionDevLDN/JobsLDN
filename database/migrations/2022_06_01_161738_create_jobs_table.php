<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->nullable(); //company
            $table->string('title')->nullable();
            $table->longText('summery')->nullable();
            $table->string('pdf_details')->nullable();
            $table->foreignId('city_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('type_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('category_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('currency_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('per_id')->nullable()->constrained()->cascadeOnDelete()->cascadeOnUpdate();
            $table->double('salary')->default(0);
            $table->date('expired_at')->nullable();
            $table->string('job_post_email')->nullable();
            $table->boolean('is_super_post')->default(0);
            $table->bigInteger('applicants_count')->default(0);
            $table->bigInteger('views_count')->default(0);
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
        Schema::dropIfExists('jobs');
    }
};
