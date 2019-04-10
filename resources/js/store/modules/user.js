export default {
    namespaced: true,
    state: {
        auth: {
            isLoggedin: true,
            name: null,
            api_token: null,
            user_id: null,
            role: null
        }
    },

    mutations: {
        userInfo(state) {
            state.auth.user_id = localStorage.getItem('user_id');
            state.auth.api_token = localStorage.getItem('api_token');
            state.auth.name = localStorage.getItem('name');
            state.auth.role = localStorage.getItem('role');
            state.auth.isLoggedin = !! state.auth.user_id && state.auth.api_token && state.auth.name && state.auth.role;
        }
    },

    actions: {
        updateUserInfo({commit}, data) {
            let ls = localStorage;
            if (data) {
                data.user_id ? ls.setItem('user_id', data.user_id) : ls.removeItem('user_id');
                data.api_token ? ls.setItem('api_token', data.api_token) : ls.removeItem('api_token');
                data.name ? ls.setItem('name', data.name) : ls.removeItem('name');
                data.role ? ls.setItem('role', data.role) : ls.removeItem('role');
            }
            commit('userInfo');
        },
    }
}

