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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('name')->storedAs("concat(first_name, ' ', last_name)")->nullable();
            $table->string('email')->unique();
            $table->string('confirm_email')->nullable()->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('read_conditions')->default(0);
            $table->string('photo')->nullable();
            $table->enum('type', ['job_seeker', 'company'])->default('job_seeker');
            $table->string('company_name')->nullable();
            $table->string('employee_count')->nullable();
            $table->string('industry')->nullable();
            $table->string('website_url')->nullable();
            $table->string('overview')->nullable();
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
        Schema::dropIfExists('companies');
    }
};
