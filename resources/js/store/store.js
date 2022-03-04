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
       cliselecionado:true
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
            const itemExists = state.produtos.findIndex((i) => i.id === payload.id);
            if(itemExists >= 0 ){
                state.produtos[itemExists].qtde++;
            } else {

                let dados = {}
                dados.id = payload.id
                dados.nome = payload.nome
                dados.codbarras = payload.codbarras
                dados.valor = Number(payload.valor)
                dados.qtde = Number(1)
                
                state.produtos.push(dados);                
            }
        },
        cliselecionado(state, payload){
            state.cliselecionado = payload
        },
        delProduto(state, payload){
            state.produtos.splice(payload, 1)
        }
    }  
})
