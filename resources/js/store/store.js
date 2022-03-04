import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

// Vue.filter('dinheiro', valor => {
// 	return `R$ ${parseFloat(valor).toFixed(2)}`.replace('.', ',')
// })

export default new Vuex.Store({

    state: {
       cliente:{},
       produtos:[],
       cliselecionado:false
    },
    getters: {
        getClientes(state) {
            return state.cliente
        },
        getProduto(state) {
            return state.produtos
        }        
    },
    mutations: {
        addCliente(state, payload) {
            state.cliente = payload
        },
        addProduto(state, payload){
            state.produtos.push(payload)
        },
        cliselecionado(state, payload){
            state.cliselecionado = payload
        },
        delProduto(state, payload){
            state.produtos.splice(payload, 1)
        }
    }  
})
