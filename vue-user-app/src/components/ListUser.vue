<script>
import UserDetailModal from "./UserDetailModal.vue";
import UserItem from "./UserItem.vue";

export default {
  name: "users-list",
  props: ["users"],
  data() {
    return {
      showModal: false,
      username: null,
    };
  },
  methods: {
    handleShowModal(username) {
      this.showModal = true;
      this.username = username;
    },
    handleOnClose() {
      this.username = null;
      this.showModal = false;
    },
  },
  components: UserItem,
  mounted() {
    console.log(this.users);
  },
  components: { UserDetailModal },
};
</script>

<template>
  <div class="row justify-content-center">
    <div class="col-md-8 mb-2" v-for="(user, index) in users" key="index">
      <div
        class="card"
        role="button"
        data-toggle="modal"
        data-target="#userDetailModal"
        @click="handleShowModal(user.login)"
      >
        <div class="card-body d-flex align-items-center">
          <div class="avatar mx-2">
            <img
              class="rounded-circle"
              :src="user.avatar_url"
              alt=""
              :width="100"
            />
          </div>
          {{ user.login }}
        </div>
      </div>
    </div>
  </div>
  <UserDetailModal
    v-if="showModal"
    :username="username"
    @on-close="handleOnClose"
  />
</template>