// require('./bootstrap');

window.Vue = require('vue');

Vue.component('tickets', require('./components/Tickets.vue').default);
Vue.component('tikect-component', require('./components/tikects/Tikect.vue').default);
const app = new Vue({
    el: '#app',
});
