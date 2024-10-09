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
        Schema::create('controle_rotinas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subrotina_id')->constrained('subrotinas');
            $table->foreignId('funcionario_id')->constrained('funcionarios');
            $table->foreignId('empresa_id')->constrained('empresas');
            $table->foreignId('departamento_id')->constrained('departamentos');
            $table->string('mes_referencia');
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
        Schema::dropIfExists('controle_rotinas');
    }
};
