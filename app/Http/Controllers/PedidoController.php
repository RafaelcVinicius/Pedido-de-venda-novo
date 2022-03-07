<?php

namespace App\Http\Controllers;


use App\Models\Pedido;
use App\Models\Itempedido;
use App\Models\Clientes;
use App\Models\Produtos;
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

    public function consultaproduto(Request $request){

        $dados = Produtos::where('nome', 'like', '%'.$request->nome.'%')->get();
        return json_decode($dados);        
    }

    public function gravarpedidoproduto(Request $request){ 

        $dados = new Itempedido();
        $dados->id_venda = $request->idvenda;
        $dados->id_produto = $request->idproduto;
        $dados->qtde = $request->qtde;
        $dados->valor = $request->valor;
        $dados->percacrescimo = 0;
        $dados->percdesconto = 0;
        $dados->save();

    }

    public function gravarpedidoclientealterar(Request $request){
        
        $dados = Pedido::find($request->idpedido);
        $dados->id_cliente = $request->idcliente;
        $dados->save();
    }

    public function gravarpedidocliente(Request $request){
        

        $dados = new Pedido();
        $dados->id_cliente = $request->idcliente;
        $dados->id_vendedor = $request->idvendedor;
        $dados->situacao = "Aberto";
        $dados->save();

        return json_encode($dados->id);

    }
}