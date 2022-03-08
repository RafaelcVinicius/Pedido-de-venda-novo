<template>
    <div class="form">
        <div class="nome">  
            <fieldset class="input">
                <legend><label for="cnpjcpf">CNPJ/CPF</label></legend>  
                <input type="text"  name="cnpjcpf" id="cnpjcpf">
            </fieldset>

            <fieldset class="input">
                <legend><label for="nome">Nome</label></legend>  
                <input type="text" name="nome" id="nome">
            </fieldset>                                            
        </div>
        <div class="valor-qtde">  
            <fieldset class="input ">
                <legend><label for="telefone">Telefone</label></legend>
                <input type="text" name="telefone" id="telefone">
            </fieldset>

            <fieldset class="input">
                <legend><label for="cep">CEP</label></legend>
                <input type="text" name="cep" id="cep">
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