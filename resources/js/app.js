import './bootstrap';
import {createApp} from "vue";
import App from "./App.vue"
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import router from "@/router/index.js";
import store from '@/store';

createApp(App)
    .use(router)
    .use(store)
    .mount("#app")

axios.defaults.baseURL = 'http://simple-blog.test/api';

axios.interceptors.request.use((config) => {
    const token = localStorage.getItem('authToken')
    if (token) {
        store.commit('auth/setToken', token);
        store.commit('auth/setAuthenticated', true);

        axios.defaults.headers.common['Authorization'] = `Bearer ${token}`;
    }
    return config
});
export default axios
