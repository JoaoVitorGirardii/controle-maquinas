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
        Schema::create('tbbairro', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->bigInteger('cidade_id');
            $table->timestamps();

            $table->foreign('cidade_id')->references('id')->on('tbcidade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbbairro');
    }
};
