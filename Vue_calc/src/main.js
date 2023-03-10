import { createApp } from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import axios from "axios";
import VueAxios from "vue-axios";

const app = createApp(App).use(store);
app.use(VueAxios, axios);
app.provide("axios", app.config.globalProperties.axios); // provide 'axios'
app.use(router).mount("#app");

axios.interceptors.request.use(
    function (config) {
        config.baseURL = "api";
        // Здесь можете сделать что-нибудь с перед отправкой запроса
        return config;
    },
    function (error) {
        // Сделайте что-нибудь с ошибкой запроса
        return Promise.reject(error);
    }
);

axios.interceptors.response.use(function (response) {
    alert("Ответ = " + response.data);
    return response;
});
