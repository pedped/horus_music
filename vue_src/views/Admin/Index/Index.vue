<script>

import sidebar from "../Sidebar.vue";
import axios from "axios";
import router from "../../../router";

export default {
  data() {
    return {
      numberOfUsers: 0,
      numberOfMusics: 0,
      musicList: []
    }
  },
  components: {
    "sidebar": sidebar
  },
  methods: {
    viewMusic(musicItem) {
      router.push("/admin/music/view/" + musicItem.id)
    },
    loadData() {


      // generate a form for list
      let formData = new FormData();

      // add user parameters
      formData.set("auth_user_id", localStorage.getItem("userId"));
      formData.set("auth_user_token", localStorage.getItem("token"));



      axios.post("/admin/index/index" , formData)
          .then(response => {
            console.log(response.data)
            if (response.data.userCount != undefined) {

              this.numberOfUsers = response.data.userCount;
              this.numberOfMusics = response.data.musicCount;
              this.musicList = response.data.musicList;


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
        <div class="row">
          <div class="col-md-6 info-holder">
            <div class="box">
              <h3>Users</h3>
              <hr/>
              <p>{{ numberOfUsers }} Users</p>
            </div>
          </div>
          <div class="col-md-6 info-holder">
            <div class="box">
              <h3>Musics</h3>
              <hr/>
              <p>{{ numberOfMusics }} Musics</p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <h3 style="margin-top: 36px;margin-bottom: 24px">Latest Uploaded Musics</h3>

            <template v-if="musicList.length > 0">
              <table class="table  table-dark table-striped">
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
                  <th>
                    Action
                  </th>
                </tr>
                <tr v-for="musicItem in this.musicList">
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

                  <td>
                    <button @click="viewMusic(musicItem)" class="btn btn-primary">View</button>
                  </td>

                </tr>
              </table>
            </template>

            <template v-if="musicList.length == 0">
              <p>No music uploaded at this time</p>
            </template>
          </div>
        </div>

      </div>

    </div>


  </div>

</template>

<style scoped>

.info-holder .box {
  border: 1px solid #333333;
  padding: 24px;
  border-radius: 8px;
}

.info-holder .box p {
  font-size: 24px;
  color: #a52834;
}

.info-holder .box hr {
  border-top: 1px solid #000000;
  border-bottom: 1px solid #777777;
}

.table {
  color: #fff;
}

tr {
  border-color: #777777;
}


.cont{
  height: 100%;
}

</style>