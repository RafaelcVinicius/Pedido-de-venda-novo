<template>
    <div class="pes sect">
        <fieldset class="fieldset" :class="{ativocli: displaycliente }"><legend>Cliente</legend>
            <input autocomplete="off"  @keyup.prevent="cliente" v-model="nomecliente" name="cliente" type="text ">
        </fieldset>
        <div   v-show="displaycliente" class="stat">
            <ul class="ul">
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
    },
    created()
       {
        this.nomecliente = this.$store.state.cliente.nome
        }
    
}
</script>
<style scoped>
    .ativocli{
        border-top-right-radius: 25px;
        border-top-left-radius: 25px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
        border-bottom:none;
    }
    li{
        display: flex;
        align-items: center;
        list-style: none;
        height: 15px;
        padding: 10px;  
    }
    ul{
        list-style: none;
        height: 50;
        border: 1px solid rgba(0, 0, 0, 0.20);
        border-top:none ;
        background-color: white;
        border-radius: 0 0 25px 25px;
        color: rgba(0, 0, 0, 0.62);
    }
    li:hover{
        background-color: rgb(29, 98, 247);
        color: white;
    }
    .stat{
        position: absolute;
        width: 100%;
        padding-bottom: 30px;
    }
</style>