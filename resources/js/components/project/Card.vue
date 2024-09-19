<template>
    <div class="d-flex row justify-content-center shadow rounded-4 border-0 mb-5">
        <div class="d-flex justify-content-between">
            <div class="p-5 d-flex flex-column justify-content-around">
                <h2>{{ project.title }}</h2>
                <p>{{ project.body }}</p>
            </div>
            <div>
                <img :src="getThumbnail(project)" class="card-img p-5" src="@/assets/php.svg" alt="php">
            </div>
        </div>
    </div>
</template>

<script>
import defaultThumbnail from "@/assets/laravel.svg";
import '&/Projects/ProjectCard.scss';

export default {
    props: {
        project: {
            type: Object,
            default: () => ({id: null, title: null, body: null, thumbnail: null})
        }
    },
    methods: {
        getThumbnail(project) {
            if (!project.thumbnail) {
                return defaultThumbnail;
            }
            return project.thumbnail;
        }
    }
}
</script>

