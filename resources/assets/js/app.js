
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
// var Vue  = require('vue');
window.Vue.use(require('vue-resource'));
const axios = require('axios');
window.Vue.prototype.$http = axios;
import VueRouter from 'vue-router';
window.Vue.use(VueRouter);
import NewsIndex from './components/news/NewsIndex.vue';
import NewsCreate from './components/news/NewsCreate.vue';
import NewsEdit from './components/news/NewsEdit.vue';

const routes = [
    {
        path: '/',
        components: {
            NewsIndex: NewsIndex
        }
    },
    {path: '/backend/news/create', component: NewsCreate, name: 'createNews'},
    {path: '/backend/news/edit/:id', component: NewsEdit, name: 'editNews'},
];
const router = new VueRouter({ routes });

const app = new Vue({ router }).$mount('#app');

// this.$http.get
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app'
});
