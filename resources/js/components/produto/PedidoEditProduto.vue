<template>
  <div class="editar">
        <div class="nada" @click="fechardisplay">
        </div>     
        <div class="display-edit">
            <div @click="fechardisplay" class="fechar">
                <svg width="13px" height="13px" viewBox="0 0 364 364">
                <path class="fill-white" d="M42 7l140 140 140 -140c10,-9 25,-9 35,0l0 0c9,10 9,26 0,35l-140 140 140 140c9,10 9,25 0,35l0 0c-10,9 -25,9 -35,0l-140 -140 -140 140c-9,9 -25,9 -35,0l0 0c-9,-10 -9,-25 0,-35l140 -140 -140 -140c-9,-9 -9,-25 0,-35l0 0c10,-9 26,-9 35,0z"></path>
            </svg>
            </div>
            <div class="header">
                <h6>Inclusão de produto</h6>
            </div>
            <div class="div-input">
                <div>
                    <label for="">Quantidade</label>
                    <input type="text" v-model="produto.qtde"  >      
                </div>
                <div>
                    <label for="">Valor un.(R$)</label>
                    <input type="text" v-model="produto.valor">           
                </div>
                <div>
                    <label for="">Desconto(%)</label> 
                    <input type="text" v-model="produto.desconto">   
                </div>
                <div>
                    <label for="">Acréscimo(%)</label>
                    <input type="text" v-model="produto.acrescimo">    
                </div>
            </div>
            <div class="div-btn">
                <button @click="fechardisplay">Salvar</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    methods:{
        fechardisplay(){
            this.$store.commit('editProdisplay', false)
        }
    },
    computed: {
        produto(){
            return this.$store.state.produtoeditado
        }
    }
}
</script>

<style scoped>

    .editar{
        position: fixed;
        width: 100vw;
        height: 100vh;
        top: 0;
        left: 0;
        z-index: 51;
    }
    .nada{
        width: 100%;
        height: 100%;
        background-color: rgba(14, 14, 14, 0.3);
    }
    .display-edit{
        flex-wrap: wrap;
        position: absolute;
        right: 0;
        top: 0;
        max-width: 500px;
        height: 100vh;
        width: 100%;        
        background-color: rgb(255, 255, 255)
    }
    .header{
        display: flex;
        flex-wrap: wrap;
        position:relative;
        justify-content: center;
        align-items: center;
        height: 130px;
        background-color: rgba(0, 140, 255, 0.966);
        z-index: 53;
    }
    .header h6{
        display: flex;
        flex-direction:column;
        font-size: 25px;
        color:  rgb(255, 255, 255)
    }
    .div-input{
        margin-top: 50px;
        display: flex;
        flex-wrap: wrap;
        height: 400px;
        z-index: 53;
        width: 100%;
        padding: 10px;
    }
    label{
        margin-left: 25px;
    }
    .div-input > div{
        position: relative;
        width: 100%;
        margin-right: 25px;
    }
    input{
        position: absolute;
        background-color: rgb(255, 255, 255);
        border-radius: 7px;
        padding: 20px; 
        top: 30px;
        right: 5px;
        height: 50px;
        left: 5px;
        border: 1px solid rgba(0, 0, 0, 0.45);
        box-shadow: 0 0 10px  rgb(255, 255, 255)
    }
    .fechar{
        position: absolute;
        top:0px;
        right: 15px;
        z-index: 60;
        fill: white;
        padding: 15px;
    }
    .div-btn{
        display: flex;
        width: 100%;
        justify-content: center;
    }
    .div-btn button{
        max-width: 300px;
        width: 100%;
        height: 50px;
        border-radius: 7px;
        background-color: rgb(0, 153, 255);
        color: white;
        font-size: 16px;
    }
    .div-btn button:hover{
        background-color: rgb(3, 126, 241);
    }
</style>