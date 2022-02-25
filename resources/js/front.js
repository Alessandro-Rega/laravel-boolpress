/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
 require('./bootstrap');
 
window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Vue = require('vue');


import Vue from 'vue'
import App from './App.vue'
import router from "./router";

Vue.config.productionTip = false

const app = new Vue({
    el: '#app',
    render: h => h(App),
		router
});