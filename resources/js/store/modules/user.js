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
            if (data) {
                localStorage.setItem('user_id', data.user_id);
                localStorage.setItem('api_token', data.api_token);
                localStorage.setItem('name', data.name);
                localStorage.setItem('role', data.role);
            }
            commit('userInfo');
        },
    }
}

