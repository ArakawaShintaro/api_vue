
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
 //vueの直下におく
window.Vue.use(require('vuex'));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 const App = require('./components/App.vue');
 const store = require('./store/').default;

const app = new Vue({
    el: '#app',
    store,
    render: h => h(App)
});
