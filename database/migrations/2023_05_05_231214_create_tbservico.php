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
        Schema::create('tbservico', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 255);
            $table->string('tipo', 255);
            $table->string('status_id', 255);
            $table->string('cliente',255);
            $table->string('local_servico',255); //quero fazer para cadastrar como o cep da rua mas vou primeiro momento vai ser assim mesmo
            $table->integer('numero')->nullable();
            $table->date('data_inicio')->nullable();
            $table->date('data_fim')->nullable();
            $table->date('previsao_fim')->nullable();
            $table->bigInteger('maquina_id');
            $table->decimal('valor_hora');
            $table->bigInteger('funcionario_id');
            $table->timestamps();

            $table->foreign('maquina_id')->references('id')->on('tbmaquinas');
            $table->foreign('funcionario_id')->references('id')->on('tbusuarios');
            $table->foreign('status_id')->references('id')->on('tbstatus_servico');
            

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbservico');
    }
};
