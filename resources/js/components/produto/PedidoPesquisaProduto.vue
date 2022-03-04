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
            this.displayproduto = false
            this.nomeproduto = ''
            this.$store.commit('addProduto', dado)
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