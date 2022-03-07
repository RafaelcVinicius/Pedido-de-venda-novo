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
                <button class="cadastrar" onclick="document.getElementById('form-pedido').submit()" >Gravar</button>
            </div>            
    </header>
    <div id="component">
        <form action="{{route('pedido.gravar')}}" method="post" id="form-pedido">
                @csrf        
                <pedido-de-venda :vendedor="{{json_encode(Auth::user()->name)}}" :idvendedor="{{Auth::user()->id}}" />            
        </form>
    </div>
@endsection