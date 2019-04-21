import axios from 'axios';
import app from '../app';

axios.interceptors.request.use(function (config) {
    let token = app.$store.state.user.auth.api_token;
    if (token) {
        config.headers = {
            'Authorization': 'Bearer ' + token,
            'Accept': 'application/json'
        };
    }
    return config;
}, function (error) {
    console.log(error);
    return Promise.reject(error);
});

axios.interceptors.response.use(function (response) {
    return response;
}, function (error) {
    switch (error.response.status) {
        case 401:
            app.state.user.dispatch('logout');
            break;
        case 404:
            console.log(error.response.data.message);
            break;
        default:
            break;
    }
    return Promise.reject(error);
});

export default {

    getQuestionsForAdmin() {
        return axios.get('api/question');
    },

    getQuestion(id) {
        return axios.get(`api/question/${id}`)
    },

    editQuestion(id, params) {
        return axios.put(`api/question/${id}`, params);
    },

    addLink(params) {
        return axios.post('api/link', params);
    },

    editLink(id, params) {
        return axios.put(`api/link/${id}`, params);
    },

    deleteLink(id) {
        return axios.delete(`api/link/${id}`);
    },

    editAnswer(id, params) {
        return axios.get(`api/answer/${id}`, params);
    }
}