<template>
    <div class="form">
        <div class="identificadores div-flex">
            <h4 class="cl-10">Informações</h4>
            <fieldset class=" div-relativ-fild cl-10">
                <legend><label for="nome">Nome</label></legend>  
                <input  class="div-absolut" type="text" name="nome" id="nome">
            </fieldset>

            <fieldset class="div-relativ-fild cl-5">
                <legend><label for="codbarras">Código de baras</label></legend>  
                <input  class="div-absolut" type="text" name="codbarras" id="codbarras">
            </fieldset>

            <fieldset class="div-relativ-fild cl-5">
                <legend><label for="referencia">Referencia</label></legend>  
                <input class="div-absolut" type="text" name="referencia" id="referencia">
            </fieldset>

            <div class="div-relativ cl-3">
                <fieldset @click.prevent="ativarDisplayAplicacao" class="div-relativ-fild" :class="{displayselect: displayAplic}">
                    <legend><label for="aplicacao">Aplicação</label></legend>  
                    <input  readonly="readonly" v-model="Aplicacao" class="div-absolut" type="text" name="aplicacao" id="aplicacao">
                    <i class="i-btn" :class="{displayselect: displayAplic}" ><svg width="18px" height="18px" viewBox="0 0 900 300"><path d="M312 251l222 -236c10,-9 23,-15 37,-15l1 0c29,0 53,24 53,53 0,14 -6,27 -17,38l-258 274c-8,7 -17,12 -27,14 -4,1 -7,1 -11,1 -3,0 -7,0 -10,-1 -11,-2 -20,-7 -26,-13l-261 -276c-10,-10 -15,-23 -15,-37 0,-29 24,-53 53,-53l1 0c14,0 27,6 35,15l223 236z" class="fillButton"></path></svg></i>
                </fieldset>
                <ul v-show="displayAplic" class="listaselect">
                    <li @click.prevent="definirAplicacao(aplicacao)" v-for="(aplicacao, i) in listaAplicacao" :key="i" >{{aplicacao.nome}}</li>
                </ul>
            </div>

            <div class="div-relativ cl-2">
                <fieldset @click.prevent="ativarDisplayUn" class="div-relativ-fild" :class="{displayselect: displayUn}">
                    <legend><label for="unidade">Unidade comercial</label></legend>  
                    <input  readonly="readonly" v-model="Uncomercial" class="div-absolut" type="text" name="unidade" id="unidade">
                    <i class="i-btn" :class="{displayselect: displayUn}" ><svg width="18px" height="18px" viewBox="0 0 900 300"><path d="M312 251l222 -236c10,-9 23,-15 37,-15l1 0c29,0 53,24 53,53 0,14 -6,27 -17,38l-258 274c-8,7 -17,12 -27,14 -4,1 -7,1 -11,1 -3,0 -7,0 -10,-1 -11,-2 -20,-7 -26,-13l-261 -276c-10,-10 -15,-23 -15,-37 0,-29 24,-53 53,-53l1 0c14,0 27,6 35,15l223 236z" class="fillButton"></path></svg></i>
                </fieldset>
                <ul v-show="displayUn" class="listaselect">
                    <li @click.prevent="definirUncomercial(un)" v-for="(un, i) in listaUn" :key="i" >{{un.nome}}</li>
                </ul>
            </div>                

        </div>
        <div class="valores div-flex">    
            <h4 class="cl-10" >Quantidades/Valores</h4>   
            <fieldset class="div-relativ-fild cl-2">
                <legend><label for="qtde">Quantidade</label></legend>
                <input  class="div-absolut" type="text" name="qtde" id="qtde">
            </fieldset>

            <fieldset class="div-relativ-fild cl-2">
                <legend><label for="precocusto">Preço de custo (R$)</label></legend>
                <input class="div-absolut" type="text" name="precocusto" id="precocusto">
            </fieldset>

            <fieldset class="div-relativ-fild cl-2">
                <legend><label for="precovenda">Preço de Venda (R$)</label></legend>
                <input class="div-absolut" type="text" name="precovenda" id="precovenda">
            </fieldset>

            <fieldset class="div-relativ-fild cl-2">
                <legend><label for="porclucro">Lucro unitario (%)</label></legend>
                <input class="div-absolut" type="text" name="porclucro" id="porclucro">
            </fieldset>
        </div>    
    </div>
</template>

<script>
export default {
    data(){
        return{
            displayAplic:false,
            displayUn:false,
            Aplicacao:"MERCADORIA PARA REVENDA",
            Uncomercial:"UN",
            listaUn:{},
            listaAplicacao:{}
        }
    },
    methods:{
        definirUncomercial(valor){
            this.Uncomercial = valor.nome
            this.displayUn = false
        },
        definirAplicacao(valor){
            this.Aplicacao = valor.nome
            this.displayAplic = false
        },
        ativarDisplayUn(){
            this.displayUn = !this.displayUn
             this.displayAplic = false
        },
        ativarDisplayAplicacao(){
            this.displayAplic = !this.displayAplic            
            this.displayUn = false
        }
    },
    created(){
        this.$http.get('/api/consultaun').then(res => { this.listaUn = res.data })   
        this.$http.get('/api/consultaaplicaca').then(res => { this.listaAplicacao = res.data, console.log(this.listaAplicacao) })    
    }
}
</script>

<style scoped>
    h4{
        font-size: 16px;
        color: #000000b6;
    }
    .i-btn{
        position: absolute;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 46px;
        height: 42px;
        top: -8px;
        right: -1px;
        background-color: rgb(255, 255, 255);
        border-radius: 0 25px 25px 0;
        border-top: 1px solid rgba(0, 0, 0, 0.3);
        border-right: 1px solid rgba(0, 0, 0, 0.3);
        border-bottom: 1px solid rgba(0, 0, 0, 0.3);
    }
    .listaselect{
        position: absolute;
        z-index: 10;
        width: calc(100%);
        background-color: white;
        border-bottom: 1px solid rgba(0, 0, 0, 0.3);
        border-left: 1px solid rgba(0, 0, 0, 0.3);
        border-right: 1px solid rgba(0, 0, 0, 0.3);
        border-radius: 0 0 20px 25px;
        padding-bottom: 30px;
    }
    .listaselect li{
        font-size: 15px;
        color: rgba(0, 0, 0, 0.75);
        list-style: none;
        padding: 6px;
        padding-left: 20px;
    }
    .listaselect li:hover{
        background-color: rgb(0, 162, 255);
    }
    .displayselect{
        border-bottom-right-radius: 0px !important;
        border-bottom-left-radius: 0px !important;
        border-bottom:0px solid white !important;  
        padding-bottom: 20px; 
    }
    .form{
        display: flex;
        flex-wrap: wrap;
        max-width: 1280px;
        width: 100%;
        gap: 5rem;
        margin: auto;
    }
    input{
        width: calc(100% - 40px);
        font-size: 14px;
        color: rgba(0, 0, 0, 0.75);
    }
    .identificadores{
        width: 100%;
        gap: 2rem;
    }
    .div-relativ{
        position: relative;
        height: 55px;

    }
    .div-relativ-fild{
        width: 100%;
        position: relative;
        height: 50px;
        border-top-left-radius: 25px;
        border-top-right-radius: 25px;
        border-bottom-right-radius: 25px;
        border-bottom-left-radius: 25px;
        border-color: rgba(0, 0, 0, 0.35);
    }
    .div-relativ-fild legend{
        margin-left: 20px;
        color: rgba(0, 0, 0, 95);
        font-size: 14px;
    }
    .div-absolut{
        position: absolute;
        left: 20px;
        height: 30px;
    }
    .valores{
        justify-content: space-between;
        width: 100%;
        gap: 2rem;
    }
    .cl-10{
        width: 100%;
    }
</style>