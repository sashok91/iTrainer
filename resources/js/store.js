import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
  state: {
    results: [],
  },
  getters: {
    results(state) {
      return state.results.map((item) => {
        item.url = `https://ru.wikipedia.org/wiki/${item.title}`;
        return item;
      });
    },
  },
  mutations: {
    set(state, { type, items }) {
      state[type] = items;
    },
  },
  actions: {
    search({ commit }, query) {
      const url = `https://ru.wikipedia.org/w/api.php?action=query&list=search&format=json&srsearch=${query}`;
      /*jsonp(url, (error, resp) => {
        if (error) {
          throw error;
        }
        const res = resp.query.search;
        commit('set', {
          type: 'results',
          items: res,
        });
      });*/
    },
  },
});
