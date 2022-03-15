<template>
    <div class="form">
        <div class="nome">  
            <fieldset class="input">
                <legend><label for="nome">Nome</label></legend>  
                <input type="text" name="nome" id="nome">
            </fieldset>
            
            <fieldset class="input">
                <legend><label for="codbarras">Código de baras</label></legend>  
                <input type="text" name="codbarras" id="codbarras">
            </fieldset>
        </div>
        <div class="valor-qtde">  
            <fieldset class="input ">
                <legend><label for="qtde">Quantidade</label></legend>
                <input type="text" name="qtde" id="Quantidade">
            </fieldset>

            <fieldset class="input">
                <legend><label for="valor">Valor</label></legend>
                <input type="text" name="valor" id="valor">
            </fieldset>  
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style scoped>
</style>