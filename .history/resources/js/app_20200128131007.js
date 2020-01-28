/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('sedes', require('./components/Sedes/Sedes.vue').default);
Vue.component('pages', require('./components/Pages/Pages.vue').default);
//Vue.component('odels', require('./components/models/Models.vue').default);
Vue.component('nicks', require('./components/Nicks/Nicks.vue').default);
Vue.component('rules', require('./components/Rules/Rules.vue').default);
Vue.component('liquidate', require('./components/Sales/Liquidate.vue').default);
Vue.component('eps', require('./components/Info/EPS.vue').default);
Vue.component('arl', require('./components/Info/ARL.vue').default);
Vue.component('afp', require('./components/Info/AFP.vue').default);
Vue.component('banco', require('./components/Info/Banco.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
