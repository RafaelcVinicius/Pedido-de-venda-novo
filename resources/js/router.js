import { inProduction, vue } from "laravel-mix";
import Vue from "vue";
import router from "vue-router";
import pedidodevenda from './PedidoDeVenda.vue'

Vue.use(router)

export default new Router({
        router: [{
            path: 'http://localhost:8000/home/pedido/cadastro/',
            component: pedidodevenda
        }]
})