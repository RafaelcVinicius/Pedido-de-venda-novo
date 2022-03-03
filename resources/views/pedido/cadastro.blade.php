<link href="{{ asset('css/pedido/cadastrar.css') }}" rel="stylesheet">
@extends('layouts.app')
@section('content')
<Section class="section-1">
    <header class="header">
            <div class="titulo">
                <h5>Pedidos - Cadastro</h5>
            </div>
            <div class="novo">
                <button class="cadastrar" href="{{route('pedido.cadastro')}}">Cancelar</button>
                <button class="cadastrar" href="{{route('pedido.cadastro')}}">Gravar</button>
            </div>            
    </header>
    <div id="component">
        <pedido-de-venda />
    </div>

   
@endsection