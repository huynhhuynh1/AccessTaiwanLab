import { createStore } from "vuex";
import UserService from "./services/UserService";
const store = createStore({
  state: {
    isLoading: false,
    users: [],
    user: {},
  },
  mutations: {
    getAllUsers(state, users) {
      state.users = users;
    },
  },
  actions: {
    initApp(context) {
      UserService.getAll(this.perPage).then((response) => {
        context.commit("getAllUsers", response.data.users);
      });
    },
  },
  getters: {
    getUsers(state) {
      return state.users;
    },
  },
});

export default store;
