/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
 import Vue from 'vue';
 import './plugins/axios'
 import store from './store/store'

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('PedidoDeVenda', require('./components/PedidoDeVenda.vue').default);

Vue.component('PedidoProduto', require('./components/produto/PedidoProduto.vue').default);

Vue.component('PedidoPesquisaProduto', require('./components/produto/PedidoPesquisaProduto.vue').default);

Vue.component('PedidoListaDeProduto', require('./components/produto/PedidoListaDeProduto.vue').default);

Vue.component('PedidoEditProduto', require('./components/produto/PedidoEditProduto.vue').default);

Vue.component('PedidoCliente', require('./components/cliente/PedidoCliente.vue').default);

Vue.component('PedidoStatus', require('./components/cliente/PedidoStatus.vue').default);

Vue.component('PedidoPesquisa', require('./components/cliente/PedidoPesquisa.vue').default);

Vue.component('CadastroProduto', require('./components/cadastrodeproduto/CadastroProduto.vue').default);

Vue.component('CadastroCliente', require('./components/cadastrodecliente/CadastroCliente.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    store,
    el: '#component',
});
