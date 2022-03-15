<template>
    <div class="pes sect">
        <fieldset class="fieldset" :class="{ativocli: displayproduto }"><legend>Produto</legend>
            <input  @keyup.prevent="produto" v-model="nomeproduto" type="text ">
        </fieldset>
        <div   v-show="displayproduto" class="stat">
            <ul>
                <li @click="defiProduto(dado)" v-for="(dado, i) in dados" :key="i">{{dado.nome}}</li>
            </ul>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            nomeproduto:'',
            displayproduto: false,
            dados:[]
        }
    },  
    computed:{
        cliente(){
            return this.$store.state.cliente
        }
    },   
    methods: {
        produto() {
            this.displayproduto = true

            if(this.nomeproduto.length > 0){
                this.$http.post('/home/pedido/consultaproduto', {
                nome: this.nomeproduto 
                }).then(res => { this.dados = res.data })
            }else{
                this.displayproduto = false
            }
          
        },
        defiProduto(dado) {
            this.$http.post('/home/pedido/gravarproduto', {
                idvenda: this.$store.state.idpedido,
                idproduto: dado.id,
                valor: Number(dado.valor),
                qtde: Number(1),
                percacrescimo: Number(0),
                percdesconto: Number(0),
            }).then(res => res)
            
            this.displayproduto = false
            this.nomeproduto = ''
            this.$store.commit('addProduto', dado)           
        }
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
        color: rgba(0, 0, 0, 0.70);
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