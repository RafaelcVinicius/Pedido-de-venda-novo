import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

// Vue.filter('dinheiro', valor => {
// 	return `R$ ${parseFloat(valor).toFixed(2)}`.replace('.', ',')
// })

export default new Vuex.Store({

    state: {
       cliente:{},
       produtos:[]
    },
    getters: {
        getClientes(state) {
            return state.cliente
        },
        getProduto(state) {
            console.log(state)
            return state.produtos
        }
    },
    mutations: {
        addCliente(state, payload) {
            console.log(payload)
            state.cliente = payload
        },
        addProduto(state, payload){
            state.produtos.push(payload)
        }
    }  
})
