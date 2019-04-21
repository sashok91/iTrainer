import Vue from 'vue';
import Router from 'vue-router';
import Home from './pages/Home.vue';
import adminMiddleware from './middlewares/admin';

Vue.use(Router);

let router = new Router({
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
                    meta: {
                        middleware: [adminMiddleware],
                    },
                },
                {
                    path: 'admin-users',
                    name: 'adminUsers',
                    component: () => import('./pages/AdminUsers.vue'),
                    meta: {
                        middleware: [adminMiddleware],
                    },
                },
                {
                    path: 'admin-questions',
                    name: 'adminQuestions',
                    component: () => import('./pages/AdminQuestions.vue'),
                    meta: {
                        middleware: [adminMiddleware],
                    },
                },
                {
                    path: 'admin-edit-question/:id',
                    name: 'edit-question',
                    component: () => import('./pages/AdminEditQuestion.vue'),
                    meta: {
                        middleware: [adminMiddleware],
                    },
                },
                {
                    path: 'admin-add-question',
                    name: 'admin-add-question',
                    component: () => import('./pages/AdminAddQuestion.vue'),
                    meta: {
                        middleware: [adminMiddleware],
                    },
                }
            ]
        }

    ],
});

function nextFactory(context, middleware, index) {
    const subsequentMiddleware = middleware[index];
    // If no subsequent Middleware exists,
    // the default `next()` callback is returned.
    if (!subsequentMiddleware) return context.next;

    return (...parameters) => {
        // Run the default Vue Router `next()` callback first.
        context.next(...parameters);
        // Then run the subsequent Middleware with a new
        // `nextMiddleware()` callback.
        const nextMiddleware = nextFactory(context, middleware, index + 1);
        subsequentMiddleware({...context, next: nextMiddleware});
    };
}

router.beforeEach((to, from, next) => {
    if (to.meta.middleware) {
        const middleware = Array.isArray(to.meta.middleware)
            ? to.meta.middleware
            : [to.meta.middleware];

        const context = {
            from,
            next,
            router,
            to,
        };
        const nextMiddleware = nextFactory(context, middleware, 1);

        return middleware[0]({...context, next: nextMiddleware});
    }

    return next();
});

export default router;