import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios';

Vue.use(Vuex)

Vue.filter('colocarvirgula', valor => {
	return `${parseFloat(valor).toFixed(2)}`.replace('.', ',')
})

Vue.filter('RS', valor => {
	return `R$ ${parseFloat(valor).toFixed(2)}`.replace('.', ',')
})
Vue.filter('cpfcnpj', function(valor) {
    const arr = `${valor}`.split('')

    if(arr.length === 11){
        arr.splice(3, 0, '.')
        arr.splice(7, 0, '.')
        arr.splice(11, 0, '-')
        return arr.join('')
    }
    else if(arr.length === 14){
        arr.splice(2, 0, '.')
        arr.splice(7, 0, '.')
        arr.splice(11, 0, '/')
        arr.splice(15, 0, '-')
        return arr.join('')
    }else{
        return ''
    }
})

export default new Vuex.Store({

    state: {
       cliente:{},
       produtos:[],
       cliselecionado:false,
       editPro:false,
       produtonovo:[],
       idpedido:0,      
    },
    getters: {
        valorTotal(state){
            return state.produtos.map(produto => ((produto.acrescimo / 100) * (produto.valor * produto.qtde) - (produto.desconto / 100) * (produto.valor * produto.qtde)) + produto.valor * produto.qtde )
            .reduce((total, atual) => total + atual, 0)
        },
        valorTotalUn(state){
            return state.produtos.map(produto => ((produto.acrescimo / 100) * (produto.valor * produto.qtde) - (produto.desconto / 100) * (produto.valor * produto.qtde)) + produto.valor * produto.qtde )
        }
    },
    mutations: {
        addIdPedido(state, payload){
            state.idpedido = payload
        },
        addCliente(state, payload) {
            state.cliente = payload           
        },
        addProduto(state, payload){         
            const itemExists = state.produtos.findIndex((i) => i.id === payload.id);
            if(itemExists >= 0 ){
                state.produtos[itemExists].qtde++;
            } else {             
                let dados = {}
                dados.id = Number(payload.id)
                dados.nome = payload.nome
                dados.desconto = Number(0)
                dados.codbarras = Number(payload.codbarras)
                dados.valor = Number(payload.precovenda)
                dados.qtde = Number(1)
                dados.acrescimo = Number(0)
                state.produtos.push(dados);                            
            }
        },
        editProduto(state, payload){     
            state.produtonovo = payload
        },
        cliselecionado(state, payload){
            state.cliselecionado = payload
        },
        delProduto(state, payload){
            state.produtos.splice(payload, 1)
        },
        editProdisplay(state, payload){
            state.editPro = payload
        },
        formatarvalores(variavel, valor){
            variavel = valor.replace('.','').replace(',','.');
        },
        alterarproduto(state, payload){
            const indexProduto = state.produtos.findIndex((produto) => produto.id === payload.id)

            state.produtos[indexProduto].valor       = Number(payload.valor.replace('.','').replace(',','.')).toFixed(2)
            state.produtos[indexProduto].qtde        = Number(payload.qtde.replace('.','').replace(',','.')).toFixed(2)
            state.produtos[indexProduto].acrescimo   = Number(payload.acrescimo.replace('.','').replace(',','.')).toFixed(2)
            state.produtos[indexProduto].desconto    = Number(payload.desconto.replace('.','').replace(',','.')).toFixed(2)
            console.log(state.produtos[indexProduto]);
        },
    }  
})
