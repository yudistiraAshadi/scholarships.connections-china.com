
import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

const state = {
    scholarshipSearchResults: []
};

const getters = {

};

const mutations = {
    scholarshipSearchResultsChanged (state, payload) {
        state.scholarshipSearchResults = payload;
    }
};

const actions = {
    scholarshipSearchResultsChanged ({commit}, payload) {
        commit('scholarshipSearchResultsChanged', payload);
    }
};

export default new Vuex.Store({
    state,
    getters,
    mutations,
    actions
});