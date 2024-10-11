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
        Schema::create('subrotinas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->foreignId('rotina_id')->constrained('rotinas');
            $table->string('mes_referencia')->nullable();
            $table->string('semana')->nullable();
            $table->string('status')->default('pendente');
            $table->boolean('mes_fechado')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subrotinas');
    }
};
