

require('./bootstrap');

window.Vue = require('vue');


Vue.component('subscribe', require('./components/Subscribe-Button.vue').default);

const app = new Vue({
    el: '#app',
});
