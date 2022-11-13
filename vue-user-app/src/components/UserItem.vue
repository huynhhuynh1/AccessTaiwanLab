<script>
import { mapState, mapGetters } from "vuex";

export default {
  name: "user-item",
  props: ["user"],
  data() {
    return {};
  },
  methods: {
    handleShowModal(username) {
      this.$store.dispatch("showModal");
      this.$store.dispatch("fetchUser", username);
    },
  },
};
</script>

<template>
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
      <div class="user-info">
        <p>{{ user.login }}</p>
        <span v-if="user.site_admin" class="badge rounded-pill bg-primary"
          >STAFF</span
        >
      </div>
    </div>
  </div>
</template>
