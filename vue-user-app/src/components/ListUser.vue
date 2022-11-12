<script>
import UserDetailModal from "./UserDetailModal.vue";
import UserItem from "./UserItem.vue";
import { mapState, mapGetters } from "vuex";

export default {
  name: "users-list",
  props: ["users"],
  data() {
    return {};
  },
  methods: {
    handleOnClose() {
      this.$store.dispatch("showModal");
      this.$store.dispatch('resetUser');
    },
  },
  components: { UserDetailModal, UserItem },
  computed: {
    ...mapState(["isShowModal"]),
  },
};
</script>

<template>
  <div class="row justify-content-center">
    <div class="col-md-8 mb-2" v-for="(user, index) in users" key="index">
      <UserItem :user="user" />
    </div>
  </div>
  <UserDetailModal
    v-if="isShowModal"
    :username="username"
    @on-close="handleOnClose"
  />
</template>