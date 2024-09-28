<template>
    <header>
        <nav class="navbar navbar-expand-lg p-1 mb-5">
            <div class="container d-flex justify-content-between ">
                <div class="d-flex align-items-center">
                    <RouterLink :to="{name: 'home'}" class="logo text-gradient">Simple Blog</RouterLink>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <RouterLink :to="{name: 'home'}" class="nav-link">Home</RouterLink>
                    <RouterLink :to="{name: 'categories.index'}" class="nav-link">Categories</RouterLink>
                    <RouterLink :to="{name: 'projects.index'}" class="nav-link">Projects</RouterLink>
                    <RouterLink :to="{name: 'users.index'}" v-if="this.admin" class="nav-link">Users</RouterLink>
                    <RouterLink :to="{name: 'auth'}" v-if="!this.isAuthenticated" class="px-2 fs-6 text-light bg-primary rounded-1">Login</RouterLink>
                    <button v-if="this.isAuthenticated" @click="logoutUser" class="px-2 fs-6 text-light bg-primary rounded-1 border-0">Logout</button>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
    import {mapActions, mapState} from "vuex";
    import '&/Header.scss';
    export default {
        methods: {
            ...mapActions('auth', ['logout']),
            logoutUser() {
                this.logout().then(() => {
                   this.$router.push({name: 'home'})
                });
            }
        },
        computed: {
            ...mapState('auth', ['isAuthenticated', 'admin']),
        },
    }
</script>
