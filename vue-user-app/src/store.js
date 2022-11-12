import { createStore } from "vuex";
import UserService from "./services/UserService";
const store = createStore({
  state: {
    isLoading: false,
    isShowModal: false,
    users: [],
    user: {},
    perPage: 100,
  },
  mutations: {
    GET_ALL_USER(state, payload) {
      state.users = payload;
    },
    GET_USER_BY_USERNAME(state, payload) {
      state.user = payload;
    },
    SET_IS_LOADING(state) {
      state.isLoading = !state.isLoading;
    },
    SET_SHOW_MODAL(state) {
      state.isShowModal = !state.isShowModal;
    },
    SET_PER_PAGE(state, payload) {
      state.perPage = payload;
    },
    RESET_USER(state) {
      state.user = {};
    },
  },
  actions: {
    fetch(context) {
      context.commit("SET_IS_LOADING");
      UserService.getAll(this.state.perPage)
        .then((response) => {
          context.commit("SET_IS_LOADING");
          context.commit("GET_ALL_USER", response.data.users);
        })
        .catch();
    },
    fetchUser(context, username) {
      context.commit("SET_IS_LOADING");
      UserService.get(username)
        .then((response) => {
          context.commit("SET_IS_LOADING");
          context.commit("GET_USER_BY_USERNAME", response.data.user);
        })
        .catch();
    },
    showModal(context) {
      context.commit("SET_SHOW_MODAL");
    },
    resetUser(context) {
      context.commit("RESET_USER");
    },
    setPerPage(contex, perPage) {
      contex.commit('SET_PER_PAGE', perPage);
    }
  },
  getters: {
    getUsers(state) {
      return state.users;
    },
    getUser(state) {
      return state.user;
    },
  },
});

export default store;
