<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CadastroController;
use App\Http\Controllers\ConsultasController;
use App\Http\controllers\DeleteController;
use App\Http\controllers\EditarController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ServicoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/login', [LoginController::class,'Login']);
Route::post('/login',[LoginController::class,'ValidaLogin']);

//criar rotas para funcionarios? ou deixar eles no padrao?
//padrão valida se a pessoa esta logada

Route::middleware('padrao')->group(function(){
    
    Route::get('/home', [HomeController::class,'Home']);    
    Route::get('/senha', [LoginController::class,'RedefinicaoSenha']);
    Route::post('/consistesenha', [LoginController::class,'ConfirmaRefedinicaoSenha']);
    Route::get('/loginout', [LoginController::class,'Loginout']);

    //provavel mente vou ter que juntar os dois em um middleware so para validar cliente ou admin
    Route::middleware(['cliente'])->group(function(){
        //rotas para os cliente SLA
    });

    Route::middleware(['admin'])->group(function(){
        //rotas para os cliente SLA
    });

    Route::middleware(['clienteOuAdmin'])->group(function(){
        
        // cadastros
        Route::get('/cadastro/usuario', [CadastroController::class,'CadastrarUsuario']); //@CadastrarUsuario');
        Route::post('/cadastro/usuario', [CadastroController::class,'GravarUsuario']);
        
        Route::get('/cadastro/maquina', [CadastroController::class,'CadastrarMaquina']);
        Route::post('/cadastro/maquina', [CadastroController::class,'GravarMaquina']);

        Route::get('/cadastro/servico', [CadastroController::class,'CadastroServico']);
        Route::post('/cadastro/servico', [CadastroController::class,'GravarServico']);

        // consultas
        Route::get('/consulta/usuario', [ConsultasController::class,'Usuarios']);
        Route::get('/consulta/maquina', [ConsultasController::class,'Maquinas']);
        Route::get('/servicos', [ServicoController::class, 'Consultar']);

        Route::delete('/delete/{tabela}', [DeleteController::class,'Delete'])->name('delete');
        Route::put('/edit/{tabela}/{id}', [EditarController::class,'Editar'])->name('edit.registro');
        
    });

});






