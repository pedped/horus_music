import { createApp } from 'vue'
import { createPinia } from 'pinia'
import {createStore} from "vuex";

import App from './App.vue'
import router from './router'
import "./axios-config.js";


const store = createStore({
    state(){
        return {
            loginState : false,
        }
    },
    mutations: {
        setAsLoggedIn (state) {
            state.loginState = true;
        },
        setAsLoggedOff (state) {
            state.loginState = false;
        }
    },
    actions: {

    }
});



// Import Bootstrap and BootstrapVue CSS files (order is important)
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"


const app = createApp(App)

app.use(createPinia())
app.use(router)
app.use(store)

app.mount('#app')
