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
        Schema::create('hospedes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade');
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('telefone');
            $table->string('celular');
            $table->enum('tipo_documento', ['CPF', 'RG', 'Passaporte']);
            $table->string('numero_documento')->unique();
            $table->string('endereco');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
