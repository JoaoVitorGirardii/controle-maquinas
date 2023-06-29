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
        Schema::create('tbprivilegios_usuarios', function (Blueprint $table) {
            //Campos da tabela
            $table->id();
            $table->bigInteger('usuario_id');
            $table->bigInteger('tipo_privilegio_id')->comment('id do usuario');
            $table->timestamps();
            //FK da tabela
            $table->foreign('tipo_privilegio_id')->references('id')->on('tbtipos_privilegios');
            $table->foreign('usuario_id')->references('id')->on('tbusuarios');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbprivilegios_usuarios');
    }
};
