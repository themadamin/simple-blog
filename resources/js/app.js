import './bootstrap';
import {createApp} from "vue";
import App from "./App.vue"
import ElementPlus from 'element-plus'
import router from "@/router/index.js";
import store from '@/store';


createApp(App)
    .use(router)
    .use(store)
    .use(ElementPlus)
    .mount("#app")

