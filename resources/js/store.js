import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        deleteModalObj: {
            showDeleteModal: false,
            deleteUrl: '',
            data: null,
            deletingIndex: -1,
            isDeleted: null,
        },
        user: false,
    },
    getters: {
        getDeleteModalObj(state) {
            return state.deleteModalObj;
        }
    },
    mutations: {
        setDeleteModal(state, data) {
            const deleteModalObj = {...state.deleteModalObj};
            deleteModalObj.showDeleteModal = false;
            deleteModalObj.isDeleted = data;
            state.deleteModalObj = deleteModalObj;
        },
        setDeletingModalObj(state, data) {
            state.deleteModalObj = data;
        },
        updateUser(state, data) {
            state.user = data;
        }
    },
    actions: {
        changeCounterAction({commit}, data) {
            commit('changeTheCounter', data);
        }
    },
});