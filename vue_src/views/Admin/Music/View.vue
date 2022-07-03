<script>

import sidebar from "../Sidebar.vue";
import axios from "axios";

export default {
  data() {
    return {
      musicItem: null
    }
  },
  components: {
    "sidebar": sidebar
  },
  methods: {
    approveMusic() {


      // generate a form for list
      let postData = new FormData();

      // add user parameters
      postData.set("auth_user_id", localStorage.getItem("userId"));
      postData.set("auth_user_token", localStorage.getItem("token"));

      // set parameter
      postData.set("musicId", this.$route.params.id);


      axios.post("/admin/music/approve_music", postData)
          .then(response => {
            console.log(response.data)
            if (response.data != undefined) {
              this.musicItem = response.data;
            } else if (response.data.error != undefined) {
              this.message = response.data.error;
              this.messageType = "danger";
            } else {
              this.message = "Unknown error happened";
              this.messageType = "danger";
            }
          }).catch(err => {
        this.message = "an error occurred";
        this.messageType = "danger";
      })
    },
    rejectMusic() {
      // generate a form for list
      let postData = new FormData();

      // add user parameters
      postData.set("auth_user_id", localStorage.getItem("userId"));
      postData.set("auth_user_token", localStorage.getItem("token"));

      // set parameter
      postData.set("musicId", this.$route.params.id);
      axios.post("/admin/music/reject_music", postData)
          .then(response => {
            console.log(response.data)
            if (response.data != undefined) {
              this.musicItem = response.data;
            } else if (response.data.error != undefined) {
              this.message = response.data.error;
              this.messageType = "danger";
            } else {
              this.message = "Unknown error happened";
              this.messageType = "danger";
            }
          }).catch(err => {
        this.message = "an error occurred";
        this.messageType = "danger";
      })
    },
    loadData() {
      // generate a form for list
      let postData = new FormData();

      // add user parameters
      postData.set("auth_user_id", localStorage.getItem("userId"));
      postData.set("auth_user_token", localStorage.getItem("token"));

      // set parameter
      postData.set("musicId", this.$route.params.id);

      axios.post("/admin/music/view", postData)
          .then(response => {
            console.log(response.data)
            if (response.data != undefined) {
              this.musicItem = response.data;
            } else if (response.data.error != undefined) {
              this.message = response.data.error;
              this.messageType = "danger";
            } else {
              this.message = "Unknown error happened";
              this.messageType = "danger";
            }
          }).catch(err => {
        this.message = "an error occurred";
        this.messageType = "danger";
      })
    }
  },
  mounted() {
    this.loadData();
  }
}
</script>

<template>
  <div class="container cont">
    <div class="row">
      <div class="col-md-3">
        <sidebar>

        </sidebar>
      </div>
      <div class="col-md-9">
        <template v-if="this.musicItem != null">
          <h1>{{ musicItem.title }}</h1>
          <span class="badge bg-danger">{{ musicItem.userName }}</span>

          <span class="badge bg-warning">{{ musicItem.genre }}</span>

          <span class="badge bg-success">{{ musicItem.date }}</span>
          <hr>
          <p class="fw-bolder">Lyrics:</p>
          <p>

            {{ musicItem.lyrics }}
          </p>

          <hr/>
          <div>
            <p class="fw-bolder">Music File:</p>
            <audio controls style="width: 100%">
              <source :src="musicItem.musicLink" type="audio/mpeg">
              Your browser does not support the audio element.
            </audio>
          </div>

          <hr/>

          <div>
            <p class="fw-bolder">Actions:</p>
            <p>After reviewing this music file, you can decide to approve or reject this music file</p>
            <div>
              <template v-if="musicItem.status == 1">
                <button @click="approveMusic" class="btn btn-success">Approve</button>
                -
                <button @click="rejectMusic" class="btn btn-danger">Reject</button>
              </template>
              <template v-if="musicItem.status == 2">
                <button class="btn btn-danger disabled">Rejected</button>
              </template>
              <template v-if="musicItem.status == 3">
                <button class="btn btn-success disabled">Approved</button>
              </template>

              <template v-if="musicItem.status == 4">
                <button class="btn btn-published disabled">Published</button>
              </template>
            </div>
          </div>
        </template>
      </div>

    </div>


  </div>

</template>

<style scoped>

.badge {
  font-size: 120%;
  margin-right: 8px;
}


.cont {
  height: 100%;
}

</style>