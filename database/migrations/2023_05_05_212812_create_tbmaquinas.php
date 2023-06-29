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
        Schema::create('tbmaquinas', function (Blueprint $table) {
            $table->id();
            $table->string('nome',100);
            $table->bigInteger('marca_id');
            $table->date('data_fabricacao')->nullable();
            $table->date('data_aquisicao')->nullable();
            $table->decimal('valor_compra',12,2)->nullable();
            $table->integer('peso')->nullable()->comment('peso em kg');
            $table->integer('potencia')->nullable()->comment('potencia em cv');
            $table->integer('capacidade')->nullable()->comment('capacidade de carga em kg');
            $table->integer('capacidade_tanque')->nullable()->comment('capacidade em litros');
            $table->timestamps();

            $table->foreign('marca_id')->references('id')->on('tbmarca');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbmaquinas');
    }
};
