<template>
    <div class="comp-produto">
        <h5>Produto</h5>
        <pedido-pesquisa-produto />
        <pedido-lista-de-produto />
        <pedido-edit-produto v-if="displayeditproduto"/>
    </div>
</template>

<script>
export default {
    computed:{
        displayeditproduto(){
        return  this.$store.state.editPro
        }  
    }
}
</script>

<style>
    h5{
        font-size: 25px;
        color: rgba(0, 0, 0, 0.75);
        font-weight: 400;
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
        margin-bottom: 50px;
    }
</style>