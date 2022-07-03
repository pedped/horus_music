<script>
import axios from "axios";

export default {
  data() {
    return {
      data: {
        first_name: null,
        last_name: null,
        email: null,
        password: null,
      },
      message: "",
      messageType: "success"
    };
  },
  methods: {
    doSignup() {

      // clear the message
      this.message = "";
      axios.post("/user/signup", this.data)
          .then(response => {
            console.log("user created", response.data);
            if (response.data.userId != undefined) {
              this.message = "User created successfully, you can login to your account now";
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
  <div class="login-page">
    <main class="form-signin">
      <div class="form">
        <svg class="icon" x="0px" y="0px"
             width="513.255px" height="513.255px" viewBox="0 0 513.255 513.255"
             style="enable-background:new 0 0 513.255 513.255;"
             xml:space="preserve">
<g>
	<path d="M331.895,421.526V237.344l108.475-17.588c-17.277-91.572-97.64-160.85-194.234-160.85
		c-109.201,0-197.721,88.52-197.721,197.721c0,109.202,88.52,197.722,197.721,197.722c10.592,0,20.978-0.857,31.115-2.459
		c7.938-13.176,22.177-23.75,40.258-28.271C322.285,422.437,327.108,421.727,331.895,421.526z M282.463,75.043l-21.184,92.811
		h-21.185l-15.132-92.811C247.159,63.942,282.463,75.043,282.463,75.043z M246.136,330.033c-40.542,0-73.406-32.864-73.406-73.406
		c0-40.542,32.864-73.405,73.406-73.405c40.542,0,73.406,32.864,73.406,73.405C319.542,297.169,286.678,330.033,246.136,330.033z
		 M246.136,200.658c-30.869,0-55.969,25.1-55.969,55.969c0,30.866,25.1,55.97,55.969,55.97c30.867,0,55.969-25.104,55.969-55.97
		C302.105,225.758,277.002,200.658,246.136,200.658z M246.136,296.607c-22.044,0-39.977-17.933-39.977-39.98
		c0-22.044,17.939-39.977,39.977-39.977c22.047,0,39.968,17.933,39.968,39.977C286.104,278.675,268.183,296.607,246.136,296.607z
		 M271.458,486.001c0.958,5.308,3.062,10.249,6.1,14.688c-10.296,1.318-20.77,2.075-31.415,2.075
		C110.419,502.764,0,392.345,0,256.627C0,120.91,110.419,10.491,246.136,10.491c120.473,0,220.945,87.036,242.01,201.516
		l-23.896,3.88C445.057,112.913,354.586,34.702,246.136,34.702c-122.371,0-221.925,99.555-221.925,221.925
		c0,122.371,99.555,221.926,221.925,221.926c8.195,0,16.279-0.479,24.246-1.348C270.453,480.125,270.772,483.062,271.458,486.001z
		 M513.255,225.279v213.405c0,17.674-13.175,31.771-33.727,36.96c-22.562,5.592-44.343-3.854-48.67-21.148
		c-4.326-17.324,10.45-35.902,33.006-41.547c10.196-2.518,20.227-2.004,28.626,0.952V285.336L377.119,306.42l-0.532,159.944h-0.023
		c-0.101,15.15-13.761,30.016-33.408,34.88c-22.283,5.609-45.643-5.001-48.148-20.877c-4.285-17.129,10.32-35.518,32.663-41.115
		c10.054-2.5,19.878-1.997,28.135,0.893V250.817L513.255,225.279z"/>
</g>
          <g>
</g>
          <g>
</g>
          <g>
</g>
          <g>
</g>
          <g>
</g>
          <g>
</g>
          <g>
</g>
          <g>
</g>
          <g>
</g>
          <g>
</g>
          <g>
</g>
          <g>
</g>
          <g>
</g>
          <g>
</g>
          <g>
</g>
</svg>
        <h1 class="h3 mb-3 fw-normal">Join Us Now!</h1>

        <template v-if="message.length > 0">
          <div
              :class="{'alert alert-success' : messageType == 'success' , 'alert alert-danger' : messageType == 'danger'}"
              role="alert">
            {{ message }}
          </div>
        </template>

        <div class="form-floating">
          <input v-model="data.first_name" type="text" class="form-control" id="floatingInput" placeholder="First Name">
          <label for="floatingInput">First Name</label>
        </div>
        <div class="form-floating">
          <input v-model="data.last_name" type="text" class="form-control" id="floatingInput" placeholder="Last Name">
          <label for="floatingInput">Last Name</label>
        </div>
        <div class="form-floating">
          <input v-model="data.email" type="email" class="form-control" id="floatingInput" placeholder="Email">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input v-model="data.password" type="password" class="form-control" id="floatingPassword"
                 placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>

        <br/>
        <button @click="doSignup()" class="w-100 btn btn-lg btn-danger" type="submit">Signup</button>
      </div>
    </main>
  </div>
</template>
<style scoped>


.login-page {
  display: flex;
  align-items: center;
  padding-bottom: 40px;
  background-color: #212529;
  text-align: center;
  height: 100%;
}

h1 {
  color: #767c83;
}

.form-signin {
  width: 100%;
  max-width: 400px;
  padding: 15px;
  margin: auto;
}

.form-signin .checkbox {
  font-weight: 400;
}

.form-signin .form-floating:focus-within {
  z-index: 2;
}

.icon {
  max-width: 80px;
  margin-bottom: 60px;
  max-height: 80px;
}

.form {
  padding: 20px;
  border-radius: 10px;
}

h3 {
  color: #aaa;
}

.form-control {
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