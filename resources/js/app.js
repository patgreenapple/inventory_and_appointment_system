/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import Vue from "vue";
import VueSimpleAlert from "vue-simple-alert";
import { ClientTable } from 'vue-tables-2';
import VSelect from 'vue-select';
import 'vue-select/dist/vue-select.css';
Vue.use(ClientTable, {}, false, 'bootstrap4');

// main.js

Vue.use(VueSimpleAlert);
Vue.component('v-select', VSelect);
// end of copy


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('landing-page-component', require('./components/FrontEnd/LandingPageComponent.vue').default);
// Vue.component('home-component', require('./components/HomeComponent.vue').default);

// MASTER DATA
Vue.component('item-category-component', require('./components/MasterData/ItemCategoryComponent.vue').default);
Vue.component('item-component', require('./components/MasterData/ItemComponent.vue').default);
Vue.component('payment-method-component', require('./components/MasterData/PaymentMethodComponent.vue').default);
Vue.component('schedule-component', require('./components/MasterData/ScheduleComponent.vue').default);
Vue.component('services-component', require('./components/MasterData/ServicesComponent.vue').default);
Vue.component('roles-component', require('./components/MasterData/RolesComponent.vue').default);
Vue.component('user-component', require('./components/MasterData/UserComponent.vue').default);



Vue.component('inventory-component', require('./components/InventoryComponent.vue').default);
Vue.component('appointment-component', require('./components/AppointmentComponent.vue').default)
Vue.component('inquiry-component', require('./components/InquiryComponent.vue').default)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
