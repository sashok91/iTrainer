import Vue from 'vue';
import Router from 'vue-router';
import Home from './pages/Home.vue';

Vue.use(Router);

export default new Router({
    routes: [
        {
            path: '/login',
            name: 'login',
            component: () => import('./pages/auth/Login.vue'),
        },
        {
            path: '/registration',
            name: 'registration',
            component: () => import('./pages/auth/Registration.vue')
        },
        {
            path: '/app',
            component: () => import('./layouts/BaseApp.vue'),
            children: [
                {
                    path: '/',
                    name: 'home',
                    component: Home,
                },
                {
                    path: 'about',
                    name: 'about',
                    component: () => import('./pages/About.vue'),
                },
                {
                    path: '/mathtrainer',
                    name: 'mathtrainer',
                    component: () => import('./pages/MathTrainer.vue'),
                },
                {
                    path: '/search',
                    name: 'search',
                    component: () => import('./pages/Search.vue'),
                },
            ]
        }

    ],
});