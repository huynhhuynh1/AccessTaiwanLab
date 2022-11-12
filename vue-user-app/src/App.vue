<script>
import User from "./pages/User.vue";
export default {
  components: {
    User,
  },
  created: function(){
    this.$store.dispatch('fetch');
  }
};
</script>

<template>
  <main class="container">
    <User />
  </main>
</template>
