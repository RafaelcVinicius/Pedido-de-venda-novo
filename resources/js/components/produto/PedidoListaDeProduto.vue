<template>
    <div class="lista">
        <table>
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Nome</th>
                    <th>Código de barras</th>
                    <th>Qtde</th>
                    <th>Valor</th>
                    <th>Ação</th>
                </tr>
            </thead>    
            <tbody>
                 <tr v-for="(produto, i) in produtos" :key="i">
                    <td v-for="(dados, i) in produto" :key="i">{{dados}}</td> 
                </tr>  
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    computed: {
        produtos(){
            return this.$store.state.produtos
        }
    }
}
</script>

<style>

</style>