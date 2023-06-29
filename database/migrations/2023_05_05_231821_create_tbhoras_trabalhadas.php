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
        Schema::create('tbhoras_trabalhadas', function (Blueprint $table) {
            $table->id();
            $table->time('hora_inicio');
            $table->time('hora_fim');
            $table->string('descricao_atividade',100)->nullable();
            $table->bigInteger('maquina_id');
            $table->bigInteger('usuario_id');
            $table->timestamps();

            $table->foreign('maquina_id')->references('id')->on('tbmaquinas');
            $table->foreign('usuario_id')->references('id')->on('tbusuarios');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbhoras_trabalhadas');
    }
};
