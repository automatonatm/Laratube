

require('./bootstrap');

window.Vue = require('vue');

Vue.prototype.authorize  = function(handler) {
    //assidional admin privilages
    let user = window.App.user;

    return user ? handler(user) :  false
}


Vue.component('subscribe', require('./components/Subscribe-Button.vue').default);
Vue.component('channel-uploads', require('./components/Channel-Upload').default);


const app = new Vue({
    el: '#app',
});
