import Vue from 'vue';
import App from './App.vue';
import router from './router';
import store from './store/index';
import Vuetify from 'vuetify';
import './bootstrap';

Vue.use(Vuetify);

import 'vuetify/dist/vuetify.min.css';


Vue.config.productionTip = false;

const app = new Vue({
    router,
    store,
    render: h => h(App),
}).$mount('#app');
