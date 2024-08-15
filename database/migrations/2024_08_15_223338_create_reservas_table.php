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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hotel_id')->constrained()->onDelete('cascade');
            $table->foreignId('apartamento_id')->constrained('apartamentos')->onDelete('cascade');
            $table->foreignId('hospede_id')->constrained('hospedes')->onDelete('cascade');
            $table->string('codigo');
            $table->enum('status', ['ativa', 'cancelada']);
            $table->integer('quantidade');
            $table->decimal('valor_unidade', 10, 2);
            $table->decimal('valor_total', 10, 2);
            $table->date('data_entrada');
            $table->date('data_saida');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
