require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import Vuetify from 'vuetify'
import '@mdi/font/css/materialdesignicons.css'


Vue.use(Vuetify)

Vue.component('header-component', require('./components/Header.vue').default);
Vue.component('leftnav-component', require('./components/LeftNavComponent.vue').default);
Vue.component('home-component', require('./components/HomeComponent.vue').default);
Vue.component('project-component', require('./components/ProjectComponent.vue').default);
Vue.component('welcomeproject-component', require('./components/WelcomeProjectComponent.vue').default);


const app = new Vue({
    el: '#app',
});

Vue.use(Vuetify, {
    iconfont: 'mdi'
})