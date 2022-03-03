import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

// Vue.filter('dinheiro', valor => {
// 	return `R$ ${parseFloat(valor).toFixed(2)}`.replace('.', ',')
// })

export default new Vuex.Store({

    state: {
       cliente:{}
    },
    getters: {
        getClientes(state) {
            return state.cliente
        }
    },
    mutations: {
        addCliente(state, payload) {
            console.log(payload)
            state.cliente = payload
        }
    }  
})
