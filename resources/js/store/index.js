import {createStore} from "vuex";
import auth from '@/store/auth.js';
import category from "@/store/category.js";
import project from "@/store/project.js";
import user from "@/store/user.js";

const store = createStore({
    modules: {
        auth,
        category,
        project,
        user
    }
});

export default store;
