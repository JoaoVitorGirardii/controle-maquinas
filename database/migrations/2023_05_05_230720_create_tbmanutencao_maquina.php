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
        Schema::create('tbmanutencao_maquina', function (Blueprint $table) {
            $table->id();
            $table->string('descriao_problema',200)->nullable();
            $table->decimal('valor_manutencao',12,2);
            $table->string('pecas_trocadas')->nullable();
            $table->string('observacoes')->nullable();
            $table->bigInteger('maquina_id');
            $table->date('data_inicio_manutencao');
            $table->date('data_fim_manutencao');
            $table->timestamps();

            $table->foreign('maquina_id')->references('id')->on('tbmaquinas');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbmanutencao_maquina');
    }
};
