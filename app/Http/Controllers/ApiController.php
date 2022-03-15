<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Uf;
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
}
