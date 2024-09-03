import {createStore} from "vuex";
import auth from '@/store/auth.js';
import category from "@/store/category.js";

const store = createStore({
    modules: {
        auth,
        category
    }
});

export default store;
