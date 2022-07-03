<script setup>
import {RouterLink} from 'vue-router'</script>
<script>
import axios from "axios";
import router from "../router";

export default {
  computed: {
    firstName: function () {
      return localStorage.getItem("firstName");
    },
    userId: function () {
      return localStorage.getItem("userId");
    },
    isAdmin: function () {
      return localStorage.getItem("userRole") == "admin";
    }
  },
  data() {
    return {};
  },
  methods: {
    doLogout() {
      localStorage.clear();
      router.push("/login");
      console.log("user logged out");
      this.$store.commit("setAsLoggedOff");
    }
  },
  mounted() {
    if (localStorage.hasOwnProperty("userId")) {
      this.$store.commit("setAsLoggedIn")
    } else {
      this.$store.commit("setAsLoggedOff")
    }
  }
};
</script>
<template>
  <header class="p-3 bg-dark text-white">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li>
            <RouterLink to="/"><img  src="../assets/logo.png" class="nav-link px-2 text-secondary logo" to="/"></RouterLink>
          </li>

          <template v-if="$store.state.loginState == true">
            <template v-if="isAdmin">
              <li>
                <RouterLink class="nav-link px-2 text-white" to="/admin/index">Admin Panel</RouterLink>
              </li>
            </template>

            <li>
              <RouterLink class="nav-link px-2 text-white" to="/my_musics">My Musics</RouterLink>
            </li>
          </template>


        </ul>


        <div class="text-end">
          <template v-if="$store.state.loginState == true">
            <button @click="doLogout" class="btn btn-outline-light me-2" to="/logout">Logout</button>
            <RouterLink type="button" class="btn btn-danger" to="/upload">Upload Your Music</RouterLink>
          </template>
          <template v-else>
            <RouterLink class="btn btn-outline-light me-2" to="/login">Login</RouterLink>
            <RouterLink type="button" class="btn btn-danger" to="/signup">Sign-up</RouterLink>
          </template>

        </div>
      </div>
    </div>
  </header>
</template>

<style scoped>
.logo{
  max-width: 104px;
  padding: 0px;
}
</style>
