import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '@/views/HomeView.vue';
import Auth from '@/views/Auth.vue';
import ProjectIndex from '@/views/Projects/Index.vue';
import CategoryIndex from '@/views/Categories/Index.vue';

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {path: '/', name: 'home', component: HomeView},
        {path: '/auth', name: 'auth', component: Auth},
        {path: '/projects', name: 'projects.index', component: ProjectIndex},
        {path: '/categories', name: 'categories.index', component: CategoryIndex},
    ]
})

export default router
