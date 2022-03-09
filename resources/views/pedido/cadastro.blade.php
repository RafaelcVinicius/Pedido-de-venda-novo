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
                <div id="component2">
                    <botao-salvar-pedido>
                        <button class="cadastrar-gravar" onclick="document.getElementById('form-pedido').submit()" >Gravar</button>
                        <button v-slot="slot1">nome1</button>
                        <button v-slot="slot2">nome1</button>
                        <button v-slot="slot3">nome1</button>
                    </botao-salvar-pedido>   
                </div>
            </div>            
    </header>
    <div id="component">
        <form action="{{route('pedido.gravar')}}" method="post" id="form-pedido">
                @csrf        
                <pedido-de-venda :vendedor="{{json_encode(Auth::user()->name)}}" :idvendedor="{{Auth::user()->id}}" />            
        </form>
    </div>
@endsection