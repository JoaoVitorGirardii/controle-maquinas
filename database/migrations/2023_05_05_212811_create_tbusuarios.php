<?php

use App\Models\Tbusuario;
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
        Schema::create('tbusuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nome',50);
            $table->string('sobrenome',100);
            $table->string('cpf',11)->unique();
            $table->string('rg',9);
            $table->string('sexo',1);
            $table->string('estado_civil')->nullable();
            $table->date('data_nascimento');
            $table->bigInteger('endereco_id')->nullable();
            $table->string('password');
            $table->boolean('redefine_senha')->default(true);
            $table->rememberToken();
            $table->timestamps();
            $table->string('email_verified_at')->nullable();
            
            $table->foreign('endereco_id')->references('id')->on('tbendereco');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbusuarios');
    }
};
