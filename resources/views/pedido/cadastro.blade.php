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
                        <button slot="p" class="cadastrar-gravar" onclick="document.getElementById('form-pedido').submit()" >Gravar</button>
                        <button h onclick="gravareimprimir()" slot="slot1">Gravar / Imprimir A4</button>
                        <button onclick="finalizarpedido()" slot="slot2">Finalizar</button>
                        <button onclick="finalizareimprimir()" slot="slot3">Finalizar / Imprimir A4</button>
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

<script>
    function gravareimprimir(){        
        
        let idpedido = document.querySelector('#idpedido').value
        document.getElementById('form-pedido').submit()
        window.open('http://localhost:8000/home/pdf'+idpedido);
    
    }
    function finalizarpedido(){
        alert( 'final');
    }
    function finalizareimprimir(){
        alert( 'finae im');
    }

</script>
