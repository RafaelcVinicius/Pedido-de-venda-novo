<link href="{{ asset('css/pedido/cadastrar.css') }}" rel="stylesheet">
@extends('layouts.app')
@section('content')
<Section class="section-1">
    <header class="header">
            <div class="titulo">
                <h5>Pedidos - Cadastro</h5>
            </div>
            <div class="novo">
                <button class="cadastrar"><a href="{{route('pedido.index')}}" > Cancelar </a></button>
                <button class="cadastrar" onclick="document.getElementById('form-pedido').submit()" >Gravar</button>
            </div>            

    </header> 
    <div id="component">       
        <form action="{{route('pedido.gravar')}}" method="post" id="form-pedido">
                @csrf        
                <pedido-de-venda :vendedor="{{json_encode($dados->user->name)}}" :idvendedor="{{json_encode($dados->user->id)}}" :dados="{{json_encode($dados)}}"  />            
        </form>
    </div>
@endsection