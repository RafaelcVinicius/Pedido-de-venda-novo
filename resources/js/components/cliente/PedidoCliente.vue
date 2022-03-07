<template>
    <div class="comp-cliente">
        <section class="section z-50">
            <div class="desativado cl-5 sect">
                <fieldset class="fieldset"><legend>Vendedor</legend>
                    <slot></slot>
                </fieldset>
            </div>
            <div class="cl-4 sect">
                <fieldset class="fieldset" ><legend>Data</legend>
                    <input type="date"  name="dataentrega" id="">
                </fieldset>
            </div>
            <div class="cl">               
                <PedidoStatus  />
            </div>
        </section>
        <section class="section z-40">
            <div class="cl-5 cliente sect">
                <PedidoPesquisa :idvendedor="idvendedor">                    
                </PedidoPesquisa>
            </div>
            <div class=" cl-4 cnpj sect">
                <fieldset class="fieldset desativado"><legend>CNPJ/CPF</legend>
                    <input v-model="cliente.cnpjcpf" name="cnpjcpf" readonly="readonly" type="text">
                </fieldset>
            </div>
        </section>
        <section class="section">
            <div class="cl-5 sect email">
                <fieldset class="fieldset"><legend>E-mail</legend>
                    <input name="email" type="text">
                </fieldset>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    props:{idvendedor:Number},
    methods:{

    },
    computed:{
        cliente(){
            return this.$store.state.cliente
        }
    }
}
</script>

<style>
    .z-50{
        z-index: 50;
    }
    .z-40{
        z-index: 40;
    }
    .desativado{
        opacity: 0.5;
    }
    #component{
        max-width: 1280px;
        width: 100%;
    }
    .section{
        display: flex;
        position: relative;
        column-gap: 1rem;
        max-width: 1280px;
        width: 100%;
        margin-top: 10px;
        color: rgba(0, 0, 0, 0.75);
    }
    .sect{
        cursor: pointer;
        width: 100%;
        position: relative;
    }
    .fieldset{
        border: 1px solid rgba(0, 0, 0, 0.288);
        border-top-right-radius: 25px;
        border-top-left-radius: 25px;
        border-bottom-right-radius: 25px;
        border-bottom-left-radius: 25px;
        height: 65px;
        border: 1px solid #dcdcdc;        
    }
    .sect fieldset legend{
        padding:10px;
        font-size: 15px;
    }
    .sect fieldset input{
        position: absolute;
        top: 30px;
        left: 17px;
        margin: 0 20px 0 20px ;
        display: flex;
        align-items: center;
        justify-content: center;
        width: calc(100% - 50px);
        font-size: 14px;
        height: 30px;
        outline: 0;
        cursor: pointer;
        z-index: 1;
        color: rgba(0, 0, 0, 0.75);
    }
    .cl-5{
        flex: 0 0 41.66666%;
        max-width: 41.666666%;
    }
    .cl-4{
        flex: 0 0 33.333333%;
        max-width: 33.3333333%;
    }
    .cl{
        flex-basis: 0;
        flex-grow: 1;
    }
    .email{
        background-color: white;
    }
   
</style>