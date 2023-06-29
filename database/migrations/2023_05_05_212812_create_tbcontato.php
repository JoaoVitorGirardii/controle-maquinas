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
        Schema::create('tbcontato', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('usuario_id'); //criar fk dps da tabela estar criada
            $table->string('telefone',10)->nullable(); //numero com codigo de area
            $table->string('celular',11)->nullable(); //numero com codigo de area
            $table->string('email',100)->nullable();
            $table->string('website')->nullable();
            $table->timestamps();
        
            $table->foreign('usuario_id')->references('id')->on('tbusuarios');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbcontato');
    }
};
