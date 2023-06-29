<?php

namespace Database\Seeders;

use App\Models\Tbprivilegios_usuarios;
use App\Models\Tbtipos_privilegios;
use App\Models\Tbusuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CadastroAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tbtipos_privilegios::create(['id' => 1, 'descricao' => 'admin']);
        Tbtipos_privilegios::create(['id' => 2, 'descricao' => 'cliente']);
        Tbtipos_privilegios::create(['id' => 3, 'descricao' => 'funcionario']);

        Tbusuario::create(['nome' => 'Admin', 'sobrenome' => 'Administrando', 'cpf' => '99999999999', 'rg' => '99999999', 'data_nascimento' => '01-01-2023', 
                           'sexo' => 'M', 'password' => Hash::make('0000')]);

        Tbprivilegios_usuarios::create(['usuario_id' => 1, 'tipo_privilegio_id' => 1]);
        
    }
}
