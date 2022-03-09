<?php

namespace App\Http\Controllers;
use Dompdf\Adapter\CPDF;
use Dompdf\Dompdf;
use PDF;
use Illuminate\Http\Request;
use stdClass;

class DomPedfController extends Controller
{
    public function pdfteste(){
        $dados = new stdClass();
        $dados->produtos = 'teste';
        // dd($dados);
        return PDF::loadView('pdfteste', compact('dados') )->setPaper('a4', 'portrait')->stream('faaa.pdf');
    }
}
