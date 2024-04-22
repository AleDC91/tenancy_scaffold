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
        Schema::create('client_annual_deadlines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('deadline_id');
            $table->enum('status', ['pending', 'completed', 'missed']);
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('deadline_id')->references('id')->on('yearly_deadlines')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_annual_deadlines');
    }
};