<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->smallInteger('regime_id');
            $table->string('job');
            $table->text('job_description')->nullable();
            $table->date('acquisition_date');
            $table->bigInteger('annual_turnover')->nullable();
            $table->bigInteger('two_years_ago_turnover')->nullable();
            $table->bigInteger('last_year_turnover')->nullable();
            $table->boolean('has_employees');
            $table->string('CF');
            $table->boolean('properties');
            $table->text('clinic_address')->nullable();
            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('user_id')->on('employees');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
