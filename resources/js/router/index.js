import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '@/views/HomeView.vue';
import Auth from '@/views/Auth.vue';
import ProjectIndex from '@/views/Projects/Index.vue';
import ProjectCreate from '@/views/Projects/Create.vue';
import ProjectEdit from '@/views/Projects/Edit.vue';
import CategoryIndex from '@/views/Categories/Index.vue';
import CategoryCreate from '@/views/Categories/Create.vue';

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {path: '/', name: 'home', component: HomeView},
        {path: '/auth', name: 'auth', component: Auth},
        {path: '/projects', name: 'projects.index', component: ProjectIndex},
        {path: '/projects/create', name: 'projects.create', component: ProjectCreate},
        {path: '/projects/edit', name: 'projects.edit', component: ProjectEdit},
        {path: '/categories', name: 'categories.index', component: CategoryIndex},
        {path: '/categories/create', name: 'categories.create', component: CategoryCreate}
    ]
})

export default router
