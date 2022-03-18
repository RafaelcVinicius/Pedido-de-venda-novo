<template>
    <div @click.prevent="fechar" class="app">
        <input type="hidden" id="idpedido" :value="idPedido" name="id_pedido">
        <pedido-cliente :idvendedor="idvendedor">
            <input readonly="readonly" :value="vendedor" type="text">
        </pedido-cliente>
        <pedido-produto v-show="cliselecionado" />
        <forma-de-pagamento  v-show="cliselecionado" />
    </div>
</template>

<script>
export default {
    props:{
        vendedor:String,
        idvendedor:Number,
        dados:Object,
    },
    data(){
        return{
            displays:false
        }
    },
    computed:{
        cliselecionado(){
            return this.$store.state.cliselecionado
        },
        idPedido(){
            return this.$store.state.idpedido
        }
    },
    created(){
        if(this.dados != null){
        this.$store.state.idpedido = this.dados.id
        this.$store.state.produtos = this.dados.produtos
        this.$store.state.cliente = this.dados.cliente
        this.$store.state.cliente.email = this.dados.email
        this.$store.state.cliente.data = this.dados.data
        this.$store.state.cliente.status = this.dados.situacao
        this.$store.state.cliselecionado = true
        }
    },
    methods:{
        fechar(event){

            //  if (event.target.className.includes('fechar') || event.target.className.includes('div-pri')) {
            //     this.$emit('modal', false)
            // }
        }
    }
}
</script>

<style>
    .app{
        display: flex;
        flex-wrap: wrap;
        justify-content: center; 
    }
     .comp-cliente{
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        background-color: white;
        max-width: 1280px;
        width: 100%;
        padding: 35px;
        border-radius: 12px;
        box-shadow: 0 0 10px #ccc;
        margin-bottom: 1rem
    }
    .comp-produto{
        display: flex;
        flex-direction: column;
        flex-wrap: wrap;
        background-color: white;
        max-width: 1280px;
        width: 100%;
        padding: 35px;
        border-radius: 12px;
        box-shadow: 0 0 10px #ccc;
        margin-bottom: 1rem !important;
    }
</style>