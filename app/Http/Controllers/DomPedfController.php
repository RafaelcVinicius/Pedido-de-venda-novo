<?php

namespace App\Http\Controllers;
use Dompdf\Adapter\CPDF;
use Dompdf\Dompdf;
use PDF;
use Illuminate\Http\Request;
use App\Models\Pedido;
use stdClass;

class DomPedfController extends Controller
{
    public function pdfteste(){
        $dados = new stdClass();
        $dados->produtos = 'teste';
        // dd($dados);
        return PDF::loadView('pdfteste', compact('dados') )->setPaper('a4', 'portrait')->stream('faaa.pdf');
    }

    public function imprimirpdf($id){
        $dados = new stdClass();
        $dados = Pedido::find($id);
        return PDF::loadView('pdf.pdfpedido', compact('dados'))->setPaper('a4', 'portrait')->stream('Pedido'.$id.'.pdf');
    }
}
