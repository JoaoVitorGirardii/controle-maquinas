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
        Schema::create('tbcep_logra', function (Blueprint $table) {
            $table->id();
            $table->string('logradouro',200)->comment('Nome rua');
            $table->string('cep',8)->nullable();
            $table->integer('numero')->nullable()->comment('numero casa');
            $table->bigInteger('bairro_id');
            $table->bigInteger('cidade_id');
            $table->bigInteger('estado_id');
            $table->bigInteger('pais_id');
            $table->timestamps();

            $table->foreign('bairro_id')->references('id')->on('tbbairro');
            $table->foreign('cidade_id')->references('id')->on('tbcidade');
            $table->foreign('estado_id')->references('id')->on('tbestado');
            $table->foreign('pais_id')->references('id')->on('tbpais');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbcep_logra');
    }
};
