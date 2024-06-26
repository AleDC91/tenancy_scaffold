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
        Schema::create('annual_deadline_client_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_type_id');
            $table->unsignedBigInteger('annual_deadline_id');
            $table->foreign('client_type_id')->references('id')->on('client_types')->onDelete('cascade');
            $table->foreign('annual_deadline_id')->references('id')->on('yearly_deadlines')->onDelete('cascade');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('annual_deadline_client_types');
    }
};
