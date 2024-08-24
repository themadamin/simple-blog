import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '@/views/HomeView.vue';
import Auth from '@/views/Auth.vue';
import IndexProject from '@/views/Project/index.vue';

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {path: '/', name: 'home', component: HomeView},
        {path: '/auth', name: 'login', component: Auth},
        {path: '/projects', name: 'project.index', component: IndexProject},
    ]
})

export default router
