<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tblog_erros', function (Blueprint $table) {
            $table->id();
            $table->string('erro',100);
            $table->string('descricao');
            $table->string('local_erro');
            $table->timestamp('data_erro')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('detalhes')->nullable();
            $table->bigInteger('usuario_id');
            $table->timestamps();

            $table->foreign('usuario_id')->references('id')->on('tbusuarios');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblog_erros');
    }
};
