<link rel="stylesheet" href="{{asset('css/cliente/cadastrar.css')}}">
@extends('layouts.app')
@section('content')

    <section class="section-1">
        <header class="header-Cadastro">
            <div class="titulo">
                <h5>Cadastro de cliente</h5>
            </div>
            <div class="gravar">
                <button class="btn" type="button" onclick="document.getElementById('form-clientes').submit()">Gravar</button>
            </div>
        </header>
        
        <div class="cadastro">
            <div class="dados">
                <form class="form" id="form-clientes" action="{{route('clientes.store')}}" method="post">
                    @csrf                  
                   <div id="component">
                       <cadastro-cliente />
                   </div>
                </form>
            </div>
        </div>
    </section>
@endsection