<script>
import router from "../../router";

export default {
  methods: {
    doLogout() {
      localStorage.clear();
      router.push("/login");
      console.log("user logged out");
    }
  },
  mounted() {
    this.doLogout();
  }
};
</script>

<template>
  <div>

  </div>
</template>