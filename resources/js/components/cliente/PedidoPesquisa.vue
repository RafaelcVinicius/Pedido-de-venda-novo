<template>
    <div class="pes sect">
        <fieldset class="fieldset" :class="{ativocli: displaycliente }"><legend>Cliente</legend>
            <input autocomplete="off"  @keyup.prevent="cliente" v-model="nomecliente" name="cliente" type="text ">
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
    props:{idvendedor: Number},
    data(){
        return{
            nomecliente:'',
            displaycliente: false,
            dados:[],
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

            if(this.$store.state.idpedido === 0){
                this.$http.post('/home/pedido/gravarcliente', {
                    idvendedor: this.idvendedor,
                    idcliente: dado.id
                }).then(res => {this.$store.commit('addIdPedido', res.data) })
            }else{
                this.$http.post('/home/pedido/gravarclientealterar', {
                    idpedido: this.$store.state.idpedido,
                    idcliente: dado.id
                }).then(res => res.data)
            }

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