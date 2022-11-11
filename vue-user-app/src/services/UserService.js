import http from "../http-common";

class UserService {
  getAll(per_page = 100) {
    return http.get(`/users?per_page=${per_page}`);
  }

  get(username) {
    return http.get(`/users/${username}`);
  }
}

export default new UserService();