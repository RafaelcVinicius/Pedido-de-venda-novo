<template>
    <div class="pes sect">
        <fieldset class="fieldset" :class="{ativocli: displaycliente }"><legend>Cliente</legend>
            <input  @keyup.prevent="cliente" v-model="nomecliente" type="text ">
        </fieldset>
        <div   v-show="displaycliente" class="stat">
            <ul>
                <li @click="defiCliente(dado)" v-for="(dado, i) in dados" :key="i">{{dado.nome}}</li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            nomecliente:'',
            displaycliente: false,
            dados:[]
        }
    },     
    methods: {
        cliente() {
            this.displaycliente = true

        if(this.nomecliente.length > 0){
            this.$http.post('/home/pedido/consultacliente', {
            nome: this.nomecliente 
            }).then(res => { this.dados = res.data })
        }else{
            this.displaycliente = false
        }

        },
        defiCliente(dado) {
            this.displaycliente = false
            this.nomecliente = dado.nome
            this.$store.commit('addCliente', dado)
            this.$store.commit('cliselecionado', true)
        }
    }
}
</script>
<style>
    .ativocli{
        border-top-right-radius: 25px;
        border-top-left-radius: 25px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        border-bottom:none ;
    }
</style>