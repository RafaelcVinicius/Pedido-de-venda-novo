<link rel="stylesheet" href="{{asset('css/produto/cadastrar.css')}}">
@extends('layouts.app')
@section('content')

    <section class="section-1">
        <header class="header-Cadastro">
            <div class="titulo">
                <h5>Cadastro de Produto</h5>
            </div>
            <div class="gravar">
                <button class="btn" type="button" onclick="document.getElementById('form-produto').submit()">Gravar</button>
            </div>
        </header>
        
        <div class="cadastro">
            <div class="dados">
                <form class="form" id="form-produto" action="{{route('produtos.store')}}" method="post">
                    @csrf    
                    <div id="component">
                        <cadastro-produto />
                    </div>
                    
                    
                   
                </form>
            </div>
        </div>
    </section>
@endsection