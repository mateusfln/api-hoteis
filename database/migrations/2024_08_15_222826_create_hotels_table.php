<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::create('hoteis', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->string('url');
        $table->string('cnpj');
        $table->string('status')->default('ativo');
        $table->timestamps();
    });
}
};
