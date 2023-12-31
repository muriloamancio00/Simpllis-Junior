/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue'
//importando e configurando o vuex
import Vuex from 'Vuex'
Vue.use(Vuex)

//essa é uma forma de dizer onde esses atributos centralizados serao encontrados
const store = new Vuex.Store({
    state: {
        teste: 'Teste de Rec',
        item: {},
        //de acordo com a situação da transação, irei alimentar o atributo e aplicar nas logicas de feedback
        transacao: {status: '', mensagem: '', dados: ''}
    },
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('tabela-component', require('./components/Tabela.vue').default);
Vue.component('input-component', require('./components/Input.vue').default);
Vue.component('card-component', require('./components/Card.vue').default);
Vue.component('carro-component', require('./components/Carro.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store
});
