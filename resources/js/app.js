require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import Vuetify from 'vuetify'
import '@mdi/font/css/materialdesignicons.css'
import VueApexCharts from 'vue-apexcharts'
import Vuelidate from 'vuelidate'

Vue.use(Vuetify)
Vue.use(Vuelidate)

Vue.component('apexchart', VueApexCharts);

Vue.component('leftnav-component', require('./components/LeftNavComponent.vue').default);
Vue.component('home-component', require('./components/HomeComponent.vue').default);
Vue.component('project-component', require('./components/ProjectComponent.vue').default);
Vue.component('evaluation-component', require('./components/EvaluationComponent.vue').default);
Vue.component('metric-component', require('./components/MetricComponent.vue').default);
Vue.component('report-component', require('./components/ReportComponent.vue').default);

Vue.component('selectmetric-component', require('./components/pages/SelectMetricComponent.vue').default);
Vue.component('showmetric-component', require('./components/pages/ShowMetricComponent.vue').default);
Vue.component('form-component', require('./components/pages/FormComponent.vue').default);
Vue.component('yourproject-component', require('./components/pages/YourProjectComponent.vue').default);
Vue.component('reportpage-component', require('./components/pages/ReportPagesComponent.vue').default);

Vue.component('addmetric-component', require('./components/form/AddMetricComponent.vue').default);
Vue.component('upload-component', require('./components/form/UploadComponent.vue').default);
Vue.component('editmetric-component', require('./components/form/EditmetricComponent.vue').default);


const app = new Vue({
    el: '#app',
    vuetify: new Vuetify()
});

Vue.use(Vuetify, {
    iconfont: 'mdi'
})