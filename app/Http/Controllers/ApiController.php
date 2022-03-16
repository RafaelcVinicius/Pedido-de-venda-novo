<?php

namespace App\Http\Controllers;

use App\Models\Aplicacaoproduto;
use App\Models\Cidade;
use App\Models\Uf;
use App\Models\Uncomercial;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    

    public function consultaUF(){
        $dados = Uf::all();

        return json_encode($dados);
    }

    public function consultacidadesuf(Request $request){
        $dados = Cidade::where('id_uf', $request->idcidade)->get();

        return json_encode($dados);
    }

    public function consultaUn(){
        $dados = Uncomercial::all();

        return json_encode($dados);
    }

    public function consultaAplicaca(){
        $dados = Aplicacaoproduto::all();

        return json_encode($dados);
    }
}
