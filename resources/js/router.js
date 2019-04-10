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
                    path: '',
                    name: 'home',
                    component: Home,
                },
                {
                    path: 'studying',
                    name: 'studying',
                    component: () => import('./pages/Studying.vue'),
                },
                {
                    path: 'view-questions',
                    name: 'viewQuestions',
                    component: () => import('./pages/ViewQuestions.vue'),
                },
                {
                    path: 'stats',
                    name: 'stats',
                    component: () => import('./pages/Stats.vue'),
                },

                {
                    path: 'admin-comments',
                    name: 'adminComments',
                    component: () => import('./pages/AdminComments.vue'),
                },
                {
                    path: 'admin-users',
                    name: 'adminUsers',
                    component: () => import('./pages/AdminUsers.vue'),
                },
                {
                    path: 'admin-questions',
                    name: 'adminQuestions',
                    component: () => import('./pages/AdminQuestions.vue'),
                },
            ]
        }

    ],
});