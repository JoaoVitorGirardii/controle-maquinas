<?php

namespace Database\Seeders;

use App\Models\Tbmarca;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CadastroMarca extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tbmarca::create(['id' => 1,	'nome' => 'Caterpillar', 'descricao' => 'Uma das marcas mais conhecidas de máquinas pesadas.']);
        Tbmarca::create(['id' => 2,	'nome' => 'Komatsu', 'descricao' => 'Fabricante japonês de equipamentos de construção e mineração.']);
        Tbmarca::create(['id' => 3,	'nome' => 'Volvo', 'descricao' => 'Empresa sueca que produz uma ampla gama de equipamentos pesados.']);
        Tbmarca::create(['id' => 4,	'nome' => 'Hitachi', 'descricao' => 'Fabricante japonesa de máquinas pesadas e equipamentos de construção.']);
        Tbmarca::create(['id' => 5,	'nome' => 'John Deere', 'descricao' => 'Empresa americana especializada em equipamentos agrícolas e de construção.']);
        Tbmarca::create(['id' => 6,	'nome' => 'Liebherr', 'descricao' => 'Fabricante alemã de máquinas de construção e mineração.']);
        Tbmarca::create(['id' => 7,	'nome' => 'JCB', 'descricao' => 'Empresa britânica que produz máquinas para construção, agricultura e indústria.']);
        Tbmarca::create(['id' => 8,	'nome' => 'Case', 'descricao' => 'Fabricante americana de equipamentos de construção.']);
        Tbmarca::create(['id' => 9,	'nome' => 'Doosan', 'descricao' => 'Empresa sul-coreana que produz máquinas pesadas e equipamentos de construção.']);
        Tbmarca::create(['id' => 10,'nome' => 'Kobelco', 'descricao' => 'Fabricante japonesa de equipamentos de construção e demolição.']);
        //adicionar aqui caso tenha mais marcas
    }
}
