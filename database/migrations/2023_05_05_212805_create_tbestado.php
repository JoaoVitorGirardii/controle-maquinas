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
        Schema::create('tbestado', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('sigla',2);
            $table->bigInteger('pais_id');
            $table->timestamps();
            
            $table->foreign('pais_id')->references('id')->on('tbpais');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbestado');
    }
};
