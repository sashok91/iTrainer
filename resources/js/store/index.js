import Vuex from 'vuex';
import Vue from 'vue';
import nav from './modules/nav';
import user from './modules/user';

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        nav,
        user
    },
});
