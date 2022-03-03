<template>
    <div class="app">
        <pedido-cliente />
        <pedido-produto />
    </div>
</template>

<script>

export default {

}
</script>

<style>
    #component{
        display: flex;
        flex-wrap: wrap;
        max-width: 1280px;
        width: 100%;
    }
    .app{
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        max-width: 1280px;
        width: 100%;
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
</style>