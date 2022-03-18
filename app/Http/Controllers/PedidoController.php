<?php

namespace App\Http\Controllers;

use App\Http\Resources\PedidoResource;
use App\Models\Pedido;
use App\Models\Itempedido;
use App\Models\Clientes;
use App\Models\Produtos;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class PedidoController extends Controller
{
    function index() {
        
        $dados = Pedido::get();
        
        return view('pedido.index')->with('pedidos', $dados);
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

        $dado = Itempedido::where('id_venda', $request->idvenda)->where('id_produto', $request->idproduto)->first();
        if($dado != null){
            $dado->qtde =  $dado->qtde + 1;            
        }else{
            $dado = new Itempedido();
            $dado->id_venda      = $request->idvenda;
            $dado->id_produto    = $request->idproduto;
            $dado->qtde          = $request->qtde;
            $dado->valor         = $request->valor;
            $dado->percacrescimo = 0;
            $dado->percdesconto  = 0;
        }
        $dado->save();
    }

    public function deleteproduto(Request $request){
        $dados = Itempedido::where('id_venda', $request->idpedido)->where('id_produto', $request->idproduto)->first();
        $dados->delete();
    }

    public function editarproduto(Request $request){
        $dados = Itempedido::where('id_venda', $request->idpedido)->where('id_produto', $request->idproduto)->first();
        $dados->valor         = str_replace(',' , '.', str_replace('.' ,'' , $request->valor));
        $dados->qtde          = str_replace(',' , '.', str_replace('.' ,'' , $request->qtde));
        $dados->percacrescimo = str_replace(',' , '.', str_replace('.' ,'' , $request->acrescimo));
        $dados->percdesconto  = str_replace(',' , '.', str_replace('.' ,'' , $request->desconto));
        $dados->save();
    }
    
    public function gravarpedidoclientealterar(Request $request){
        
        $dados = Pedido::find($request->idpedido);
        $dados->id_cliente = $request->idcliente;
        $dados->save();
    }

    public function gravarpedidocliente(Request $request){
    
        $dados = new Pedido();
        $dados->id_cliente  = $request->idcliente;
        $dados->id_vendedor = $request->idvendedor;
        $dados->situacao    = "Aberto";
        $dados->save();

        return json_encode($dados->id);
    }

    public function editarpedido($id){

        $dados = Pedido::findOrFail($id);
        $dados = new PedidoResource($dados);

       return view('pedido.editar')->with('dados', $dados);
    }
    public function cancelarpedido($id) {

        $dados = Pedido::find($id);
        $dados->delete();

        return redirect()->route('pedido.index');
    }
}

