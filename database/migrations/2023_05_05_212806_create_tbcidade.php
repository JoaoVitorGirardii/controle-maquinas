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
        Schema::create('tbcidade', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('sigla',2);
            $table->bigInteger('estado_id');
            $table->timestamps();

            $table->foreign('estado_id')->references('id')->on('tbestado');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbcidade');
    }
};
