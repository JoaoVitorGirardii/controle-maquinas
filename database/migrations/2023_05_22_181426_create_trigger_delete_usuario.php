<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // cria a função que a trigger vai executar
        // caso tenha mais tabelas futuramente usando o id do usuario como FK, será necessário adicionar ela aqui para remover, através da trigger.
        DB::unprepared("
        CREATE OR REPLACE FUNCTION public.delete_privilegio_usuario()
            RETURNS trigger
            LANGUAGE 'plpgsql'
            COST 100
            VOLATILE NOT LEAKPROOF
        AS $$
        BEGIN
            DELETE FROM tbprivilegios_usuarios WHERE usuario_id = OLD.id;
            DELETE FROM tbcontato WHERE usuario_id = OLD.id;
            RETURN OLD;
        END;
        $$;

        ALTER FUNCTION public.delete_privilegio_usuario()
            OWNER TO postgres;
        ");

        //cria a trigger
        DB::unprepared("
        CREATE TRIGGER trigger_delete_privilegio_usuario
        BEFORE DELETE
        ON public.tbusuarios
        FOR EACH ROW
        EXECUTE FUNCTION public.delete_privilegio_usuario();
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trigger_delete_privilegio_usuario ON public.tbusuarios;');
        DB::unprepared('DROP FUNCTION IF EXISTS public.delete_privilegio_usuario();');
    }
};
