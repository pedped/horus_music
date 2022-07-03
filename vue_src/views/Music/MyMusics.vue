<script>
import axios from "axios";

export default {
  data() {
    return {
      data: {
        musicList: []
      },
      message: "",
      messageType: "success"
    };
  },
  methods: {
    fetchMusicList() {

      // clear the message
      this.message = "";

      // generate a form for list
      let formData = new FormData();

      // add user parameters
      formData.set("auth_user_id", localStorage.getItem("userId"));
      formData.set("auth_user_token", localStorage.getItem("token"));

      axios.post("/music/user_list", formData)
          .then(response => {
            console.log("music list", response.data);
            this.data.musicList = response.data;
          }).catch(err => {
        this.message = "an error occurred";
        this.messageType = "danger";
      })
    }
  },
  mounted() {
    this.fetchMusicList();
  }
};
</script>

<template>
  <div class="upload-page">
    <div class="container">
      <main>
        <div class="py-5 text-center">
          <h2>Your music list</h2>
          <p class="lead">You can see your uploaded music files here</p>
        </div>

        <div class="row g-5">
          <div class="col-md-12">
            <template v-if="message.length > 0">
              <div
                  :class="{'alert alert-success' : messageType == 'success' , 'alert alert-danger' : messageType == 'danger'}"
                  role="alert">
                {{ message }}
              </div>
            </template>
          </div>
        </div>

        <div class="row g-5">
          <div class="col-md-12 col-lg-12">

            <template v-if="this.data.musicList.length > 0">
            <table class="table table-bordered">
              <tr>
                <th>
                  Music Title
                </th>
                <th>
                  Genre
                </th>
                <th>
                  File
                </th>
                <th>
                  Status
                </th>
              </tr>
              <tr v-for="musicItem in this.data.musicList">
                <td>
                  {{ musicItem.title }}
                </td>
                <td>
                  {{ musicItem.genre }}
                </td>

                <td>
                  <audio controls style="width: 100%">
                    <source :src="musicItem.musicLink" type="audio/mpeg">
                    Your browser does not support the audio element.
                  </audio>
                </td>

                <td>
                  <span class="badge bg-primary" v-if="musicItem.status == 1">
                    Uploaded
                  </span>

                  <span class="badge bg-danger" v-if="musicItem.status == 2">
                    Rejected
                  </span>

                  <span class="badge bg-success" v-if="musicItem.status == 3">
                    Approved
                  </span>

                  <span class="badge bg-danger" v-if="musicItem.status == 4">
                    Published
                  </span>
                </td>

              </tr>
            </table>
            </template>

            <template v-if="this.data.musicList.length == 0">
              <p class="text-center">No music uploaded at this time</p>
            </template>

          </div>
        </div>
      </main>
    </div>
  </div>
</template>
<style scoped>


.table {
  color: #fff;
}

svg {
  filter: invert(100%) sepia(10%) saturate(5139%) hue-rotate(294deg) brightness(123%) contrast(92%);
}
</style>