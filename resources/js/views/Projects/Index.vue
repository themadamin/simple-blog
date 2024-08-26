<script>
import Card from '@/components/project/Card.vue'

export default {
    components: {
        Card
    }
}
</script>

<template>
    <section class="py-5">
        <div class="container px-5 mb-5">
            <div class="text-center mb-5">
                <h1 class="fw-bold">
                    <span class="text-gradient">Projects</span>
                </h1>
            </div>

            <div class="mb-5 d-flex justify-content-center">
                <RouterLink :to="{name: 'projects.create'}" class="btn btn-outline-primary px-5 py-3">Create</RouterLink>
            </div>

            <div class="row gx-5 justify-content-center">
                <div class="col-lg-11 col-xl-9 col-xxl-8">
                    <card title="Project Number 1"
                          body="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab blanditiis cumque debitis,
                 enim eum facere illo itaque laborum laudantium magni molestias, pariatur porro quo ratione similique,
                  totam voluptates voluptatum. Quidem?"></card>
                    <card title="Project Number 1"
                          body="Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab blanditiis cumque debitis,
                 enim eum facere illo itaque laborum laudantium magni molestias, pariatur porro quo ratione similique,
                  totam voluptates voluptatum. Quidem?" img="@/assets/laravel.svg"></card>
                </div>
            </div>
        </div>
    </section>
</template>

<style scoped>

.text-gradient {
    background: -webkit-linear-gradient(315deg, #1e30f3 0%, #e21e80 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}
</style>
