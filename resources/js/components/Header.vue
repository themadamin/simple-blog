<script>

</script>

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
                    <RouterLink :to="{name: 'auth'}" class="px-2 fs-6 text-light bg-primary rounded-1">Login</RouterLink>
                </div>
            </div>
        </nav>
    </header>


</template>

<style scoped>
a {
    text-decoration: none;
    background-color: transparent;
}

.nav-link {
    font-weight: 500;
    font-size: 15px;
    color: rgb(107 114 128);
}

.nav-link:hover {
    color: rgb(55 65 81);
}

.logo {
    color: blue;
    font-weight: 600;
    font-size: 1.5em;
}

.text-gradient {
    background: -webkit-linear-gradient(315deg, #1e30f3 0%, #e21e80 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
</style>
