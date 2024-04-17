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
        Schema::create('employees', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->date('hire_date');
            $table->unsignedBigInteger('salary');
            $table->enum('position', [
                'Commercialista',
                'Revisore contabile',
                'Consulente fiscale',
                'Responsabile amministrativo',
                'Esperto in risorse umane',
                'Assistente contabile',
                'Segretario/a',
                'Specialista in tasse e imposte',
                'Analista finanziario',
                'Assistente fiscale',
                'stagista'
            ]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
