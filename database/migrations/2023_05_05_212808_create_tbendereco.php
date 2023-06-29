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
        Schema::create('tbendereco', function (Blueprint $table) {
            $table->id();
            $table->string('complemento',200)->nullable();
            $table->bigInteger('cep_logra_id');
            $table->string('tipo_endereco')->comment('comercial/residencial');
            $table->timestamps();

            $table->foreign('cep_logra_id')->references('id')->on('tbcep_logra');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbendereco');
    }
};
