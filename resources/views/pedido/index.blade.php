<link href="{{ asset('css/pedido/pedido.css') }}" rel="stylesheet">
@extends('layouts.app')
@section('content')
<Section class="section-pedido">
    <header class="header">
            <div class="titulo">
                <h5>Produto</h5>
            </div>
            <div class="novo">
                <a class="cadastrar" href="{{route('pedido.cadastro')}}">Novo Pedido</a>
            </div>            
    </header>
    <div class="cadastro">
       <div class="tb">
             <table id="dataTable" class="tabela-1">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Cliente</th>
                        <th>Vendedor</th>
                        <th>Previsão entrega</th>
                        <th>Situação</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>                   
                    @foreach ($pedidos as $pedido)
                    <tr>
                        <td class="td-table">{{$pedido->id}}</td>
                        <td class="td-table">{{$pedido->cliente->nome}}</td>
                        <td class="td-table">{{$pedido->user->name}}</td>
                        <td class="td-table">{{$pedido->previsaoentrega}}</td>
                        <td class="td-table">{{$pedido->situacao}}</td>
                        <td class="td-table">
                            <a class="acao-table" href="{{route('pedido.editarpedido', $pedido->id)}}"> <svg width="18px" height="18px" viewBox="0 0 4233 4233"><path class="fill-blue" d="M454 4233l2721 0c251,0 454,-203 454,-453l0 -1512c0,-84 -68,-151 -152,-151 -83,0 -151,67 -151,151l0 1512c0,83 -67,151 -151,151l-2721 0c-84,0 -152,-68 -152,-151l0 -3024c0,-84 68,-151 152,-151l1814 0c83,0 151,-68 151,-151 0,-84 -68,-152 -151,-152l-1814 0c-251,0 -454,203 -454,454l0 3024c0,250 203,453 454,453z"></path><path class="fill-blue" d="M3850 774l-1965 1966 -588 196 196 -586 1966 -1966c108,-108 283,-108 391,0 52,52 81,122 81,195 0,73 -29,144 -81,195zm383 -193l0 -5c0,-147 -57,-294 -169,-406 -109,-109 -256,-170 -409,-170 -154,0 -301,61 -410,170l-1991 1991c-17,17 -29,37 -37,59l-302 907c-26,79 16,165 96,191 15,6 31,8 47,8 17,0 33,-2 48,-8l907 -302c23,-7 43,-20 59,-36l1992 -1992c112,-112 169,-259 169,-407z"></path></svg> </a>
                            <a target="_blank" href={{route('imprimirpdf', $pedido->id)}}><svg width="18px" height="18px" viewBox="0 0 2310 2480"><path class="fill-blue" d="M1994 1757l0 506c0,55 -44,99 -99,99l-1356 0c-54,0 -98,-44 -98,-99l0 -506 -236 0c-113,0 -205,-92 -205,-206l0 -803c0,-114 92,-206 205,-206l236 0 0 -443c0,-55 44,-99 98,-99l1356 0c55,0 99,44 99,99l0 443 236 0c113,0 205,92 205,206l0 803c0,114 -92,206 -205,206l-236 0zm-307 -905l213 0c52,0 94,42 94,94l0 0c0,51 -42,93 -94,93l-213 0c-52,0 -94,-42 -94,-93l0 0c0,-52 42,-94 94,-94zm-819 1012l698 0c52,0 94,43 94,94l0 0c0,52 -42,94 -94,94l-698 0c-51,0 -93,-42 -93,-94l0 0c0,-51 42,-94 93,-94zm0 -300l698 0c52,0 94,42 94,94l0 0c0,52 -42,94 -94,94l-698 0c-51,0 -93,-42 -93,-94l0 0c0,-52 42,-94 93,-94zm-230 -1367l0 345 1159 0 0 -345 -1159 0zm1159 1968c0,-206 0,-508 0,-713l-1159 0c0,205 0,507 0,713l1159 0zm-1356 -606l0 -206c0,-54 44,-98 98,-98l1356 0c55,0 99,44 99,98l0 206 236 0c4,0 7,-3 7,-8l0 -803c0,-5 -3,-8 -7,-8 -675,0 -1350,0 -2025,0 -4,0 -8,3 -8,8l0 803c0,5 4,8 8,8l236 0z"></path></svg></a>
                        </td>
                    </tr>
                    @endforeach                    
                </tbody>
            </table>               
        </div> 
    </div>
</section>

@endsection

<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css">
<script type="text/javascript"> 
    $(document).ready( function () {
        $('#dataTable').DataTable();
    } );
    
    </script>