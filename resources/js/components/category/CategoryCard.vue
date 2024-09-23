<template>
        <a class="card align-items-center text-decoration-none border-0 hover-lift-light py-4">
                        <span class="icon-circle icon-circle-lg bg-pastel-primary text-primary">
                            <img :src="thumbnail" class="rounded-5 h-100 w-100" alt="category thumbnail">
                        </span>
            <span class="text-dark mt-3">
                          {{ this.category.name }}
                        </span>
        </a>
</template>
<script>
import defaultThumbnail from "@/assets/laravel.svg";
import '&/Category/CategoryCard.scss';

export default {
    props: {
        category: {
            type: Object,
            required: true
        }
    },
    computed: {
        thumbnail() {
            if (!this.category.thumbnail) {
                return defaultThumbnail;
            }
            return this.category.thumbnail;
        }
    }
}
</script>


