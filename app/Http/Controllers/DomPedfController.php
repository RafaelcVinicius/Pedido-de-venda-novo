<?php

namespace App\Http\Controllers;
use Dompdf\Adapter\CPDF;
use Dompdf\Dompdf;
use PDF;
use Illuminate\Http\Request;

class DomPedfController extends Controller
{
    public function pdfteste(){
        $pdf =  PDF::loadView('pdfteste');
        return $pdf->setPaper('a4', 'portrait');
    }
}
