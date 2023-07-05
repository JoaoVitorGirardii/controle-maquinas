<?php

namespace Database\Seeders;

use App\Models\TbStatus_servico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CadastroStatusServico extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TbStatus_servico::create(['id' => 1, 'tipo' => 'Cadastrado', 'descricao' => 'Serviço cadastrado no sistema']);
        TbStatus_servico::create(['id' => 2, 'tipo' => 'Iniciado', 'descricao' => 'Serviço iniciado']);
        TbStatus_servico::create(['id' => 3, 'tipo' => 'Finalizado', 'descricao' => 'Serviço finalizado']);
        TbStatus_servico::create(['id' => 4, 'tipo' => 'Parado', 'descricao' => 'Serviço parado por algum problema']);
    }
}
