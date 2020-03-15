require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import Vuetify from 'vuetify'
import '@mdi/font/css/materialdesignicons.css'


Vue.use(Vuetify)

Vue.component('leftnav-component', require('./components/LeftNavComponent.vue').default);
Vue.component('home-component', require('./components/HomeComponent.vue').default);
Vue.component('project-component', require('./components/pages/ProjectComponent.vue').default);
Vue.component('welcomeproject-component', require('./components/WelcomeProjectComponent.vue').default);
Vue.component('create-component', require('./components/CreateProjectComponent.vue').default);
Vue.component('selectmetric-component', require('./components/pages/SelectMetricComponent.vue').default);
Vue.component('showmetric-component', require('./components/pages/ShowMetricComponent.vue').default);
Vue.component('form-component', require('./components/pages/FormComponent.vue').default);
Vue.component('report-component', require('./components/pages/ReportComponent.vue').default);
Vue.component('model-component', require('./components/ModelComponent.vue').default);




const app = new Vue({
    el: '#app',
    vuetify: new Vuetify()
});

Vue.use(Vuetify, {
    iconfont: 'mdi'
})