import Vue from 'vue';
import routes from './router/index';

require('./bootstrap');

//----------added for flash message-----------
window.Vue = require('vue');
window.events = new Vue();
window.flash = function(message){
    window.events.$emit('flash', message);
}
//----------/added for flash message-----------

Vue.component('app-header', require('./components/Header.vue').default);
Vue.component('flash', require('./components/Flash.vue').default);

const app = new Vue({
     el: '#app',
     router: routes,
});
