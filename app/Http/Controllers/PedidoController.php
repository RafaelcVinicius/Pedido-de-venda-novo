<?php

namespace App\Http\Controllers;


use App\Models\Pedido;
use App\Models\Itempedido;
use App\Models\Clientes;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

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

    public function gravar(Request $request){

            $dados = Pedido::where('id', $request->id_pedido)->first();
            $dados->email = $request->email;
            $dados->situacao = $request->situacao;
            $dados->previsaoentrega = $request->previsaoentrega;
            $dados->save();

            return redirect()->route('pedido.index');
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

    public function deleteproduto(Request $request){
        $dados = Itempedido::where('id_venda', $request->idpedido)->where('id_produto', $request->idproduto)->first();
        $dados->delete();
    }




    public function editarproduto(Request $request){
        $dados = Itempedido::where('id_venda', $request->idpedido)->where('id_produto', $request->idproduto)->first();
        $dados->valor = $request->valor;
        $dados->qtde = $request->qtde;
        $dados->percacrescimo = $request->acrescimo;
        $dados->percdesconto = $request->desconto;
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