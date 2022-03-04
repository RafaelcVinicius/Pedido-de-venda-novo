<template>
    <div class="app">
        <pedido-cliente />
        <pedido-produto v-show="cliselecionado" />
    </div>
</template>

<script>

export default {
computed:{
    cliselecionado(){
        return this.$store.state.cliselecionado
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
        margin-bottom: 50px;
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