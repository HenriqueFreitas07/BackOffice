import Vue from "vue";
import Vuex from "vuex";
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex);

const state = {
    user: null,
    donations:[],
    year:false
};

const store = new Vuex.Store({
    state,
    getters: {
        user: (state) => {
            return state.user;
        },
        year: (state) => {
            return state.year;
        }
    },
    actions: {
        user: (context, user) => {
            context.commit('user', user);
        }
    },
    mutations: {
        user: (state, user) => {
            state.user = user;
        },
        donations: (state, donation) => {
            state.donations = donation;
        },
        
    },
    plugins: [createPersistedState()]
});

export default store;
