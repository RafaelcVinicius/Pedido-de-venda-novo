<template>
    <div>
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
                    <li >{{ produto }}</li>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    computed: {
        getProduto(){
            console.log('oo')
              return this.$store.state.produtos
        }
    }
}
</script>

<style>

</style>