<link rel="stylesheet" href="{{asset('css/cliente/clientes.css')}}">
@extends('layouts.app')
@section('content')
    <Section class="section-1">
        <header class="header">
                <div class="titulo">
                    <h5>Cliente</h5>
                </div>
                <div class="novo">
                    <a class="cadastrar" href="{{route('clientes.create')}}">Cadastrar</a>
                </div>            
        </header>
        
        <div class="cadastro">
            <div class="tb">
                <table id="dataTable" class="tabela-1">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>CNPJ/CPF</th>
                            <th>CEP</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>                   
                            @foreach ($clientes as $cliente)
                            <tr>
                                <td class="td-table">{{$cliente->id}}</td>
                                <td class="td-table">{{$cliente->nome}}</td>
                                <td class="td-table">{{$cliente->cnpjcpf}}</td>
                                <td class="td-table">{{$cliente->cep}}</td>
                                <td class="td-table">Ação</td>
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