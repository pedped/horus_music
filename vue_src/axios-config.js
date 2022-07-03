import axios from "axios";

axios.defaults.baseURL = "/api";
//axios.defaults.baseURL = "http://www.sample.com/api";
axios.defaults.headers = {'Content-Type': 'multipart/form-data'};