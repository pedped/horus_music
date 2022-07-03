<script>
import axios from "axios";

export default {
  data() {
    return {
      data: {
        musicTitle: null,
        musicGenre: null,
        musicLyrics: null
      },
      message: "",
      messageType: "success"
    };
  },
  methods: {
    uploadFile() {

      // clear the message
      this.message = "";

      // make a new file for upload
      let formData = new FormData();
      let musicFile = document.querySelector('#file');
      formData.append("music", musicFile.files[0]);

      // add user parameters
      formData.set("auth_user_id", localStorage.getItem("userId"));
      formData.set("auth_user_token", localStorage.getItem("token"));

      // add music parameters
      formData.set("music_title", this.data.musicTitle);
      formData.set("music_genre", this.data.musicGenre);
      formData.set("music_lyrics", this.data.musicLyrics);

      axios.post("/music/upload", formData)
          .then(response => {
            console.log("upload file", response.data);
            if (response.data.musicId != undefined) {
              this.message = "Music file uploaded successfully, you can check publishing status from My Musics menu";
              this.messageType = "success";
            } else if (response.data.error != undefined) {
              this.message = response.data.error;
              this.messageType = "danger";
            } else {
              this.message = "Unknown error happened";
              this.messageType = "danger";
            }
          }).catch(err => {
        this.message = "an error occured";
        this.messageType = "danger";
      })
    }
  },
  mounted() {

  }
};
</script>

<template>
  <div class="upload-page">
    <div class="container">
      <main>
        <div class="py-5 text-center">
          <h2>Upload your enormous music</h2>
          <p class="lead">Please fill all information listed below</p>
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
            <div class="needs-validation" novalidate>
              <div class="row g-3">
                <div class="col-sm-6">

                  <!-- Music Title-->
                  <label for="musicTitle" class="form-label">Music Title</label>
                  <input v-model="data.musicTitle" type="text" class="form-control" required>
                  <div class="invalid-feedback">
                    Valid title is required.
                  </div>
                </div>

                <div class="col-sm-6">
                  <label for="state" class="form-label">Music Genre</label>
                  <select v-model="data.musicGenre" class="form-select" required>
                    <option value="blues">Blues</option>
                    <option value="country">Country</option>
                    <option value="jazz">Jazz</option>
                    <option value="pop">Pop</option>
                    <option value="rock">Rock</option>
                  </select>
                  <div class="invalid-feedback">
                    Please provide a valid music genre.
                  </div>
                </div>

                <div class="col-12">
                  <label for="lyrics" class="form-label">Lyrics</label>
                  <div class="input-group has-validation">
                    <textarea v-model="data.musicLyrics" rows="8" type="text" class="form-control" id="lyrics"
                              placeholder="Lyrics"
                              required></textarea>
                    <div class="invalid-feedback">
                      Your username is required.
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <label for="lyrics" class="form-label">Choose music file</label>
                  <div class="input-group has-validation">
                    <input type="file" class="form-control" id="file" required>
                    <div class="invalid-feedback">
                      Your username is required.
                    </div>
                  </div>
                </div>

              </div>
              <hr class="my-4">


              <button @click="uploadFile" class="w-100 btn btn-danger btn-lg" type="submit">Upload Music</button>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
</template>
<style scoped>


html,
body {
  background-color: #212529 !important;
  color: #fff;
}

h1 {
  color: #767c83;
}


.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}

.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}

.icon {
  max-width: 60px;
  margin-bottom: 60px;
}

.form {
  padding: 20px;
  border-radius: 10px;
}

h3 {
  color: #aaa;
}

.form-control, select {
  background: #333b42;
  border: 1px solid #1c1c1c;
  color: #fff;
}

.form-floating label {
  color: #939292;
}


svg {
  filter: invert(100%) sepia(10%) saturate(5139%) hue-rotate(294deg) brightness(123%) contrast(92%);
}
</style>