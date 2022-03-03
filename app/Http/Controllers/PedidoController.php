<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use Illuminate\Http\Request;

class PedidoController extends Controller
{

    function index() {
        return view('pedido.index');
    }
    function cadastro() {

        return view('pedido.cadastro');
    }




    public function consultacliente(Request $request){

        $dados = Clientes::where('nome', 'like', '%'.$request->nome.'%')->get();
        return json_decode($dados);
        
    }
}