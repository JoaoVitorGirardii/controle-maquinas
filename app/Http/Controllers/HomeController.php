<?php

namespace App\Http\Controllers;

use App\Models\Tbprivilegios_usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function Home(){

        // add uma variavel global para fazer essa validação de cliente  ou admin ou funcionario
        
        return view('home', ['isHome' => true, 'isClienteOuAdmin' => false]);
    
    }
}
