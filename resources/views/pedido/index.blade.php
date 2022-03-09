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
                        <th>ID Cliente</th>
                        <th>ID Vendedor</th>
                        <th>Previsão entrega</th>
                        <th>Situação</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>                   
                    @foreach ($pedidos as $pedido)
                    <tr>
                        <td class="td-table">{{$pedido->id}}</td>
                        <td class="td-table">{{$pedido->id_cliente}}</td>
                        <td class="td-table">{{$pedido->id_vendedor}}</td>
                        <td class="td-table">{{$pedido->previsaoentrega}}</td>
                        <td class="td-table">{{$pedido->situacao}}</td>
                        <td class="td-table"><a class="acao-table" href="{{route('pedido.editarpedido', $pedido->id)}}"> Ação </a></td>
                    </tr>
                    @endforeach                    
                </tbody>
            </table>               
        </div> 
    </div>
    <a style="color:black" href="{{route('pdf')}}">PDF-PDF</a>
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