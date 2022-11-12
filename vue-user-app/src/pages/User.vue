<script>
import ListUser from "../components/ListUser.vue";
import { mapState, mapGetters } from "vuex";

export default {
  data() {
    return {};
  },
  methods: {
    onChange(event) {
      this.$store.dispatch('setPerPage', event.target.value);
      this.$store.dispatch('fetch');
    },
  },
  computed: {
    ...mapState(["isLoading", "perPage"]),
    ...mapGetters({ users: "getUsers" }),
  },
  components: { ListUser },
};
</script>

<template>
  <div class="row justify-content-center">
    <div class="col-md-8 mb-2">
      <div class="row">
        <div class="col-md-8">
          <h2>List user github</h2>
        </div>
        <div class="col-md-4">
          <select
            class="form-control"
            @change="onChange($event)"
            v-model="perPage"
          >
            <option value="20">20</option>
            <option value="50">50</option>
            <option value="100">100</option>
          </select>
        </div>
      </div>
    </div>
    <div class="col-md-8 pb-5">
      <div v-if="isLoading" class="d-flex justify-content-center">
        <div class="spinner-border" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
    </div>
    <ListUser v-if="users.length > 0" :users="users" />
  </div>
</template>