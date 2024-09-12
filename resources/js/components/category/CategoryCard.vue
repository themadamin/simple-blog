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
import defaultThumbnail from "@/assets/laravel.svg"

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

<style scoped>
.hover-lift-light {
    transition: box-shadow .25s ease, transform .25s ease, color .25s ease, background-color .15s ease-in;
}

.text-decoration-none {
    text-decoration: none !important;
}

.py-4 {
    padding-top: 1.5rem !important;
    padding-bottom: 1.5rem !important;
}

.align-items-center {
    align-items: center !important;
}

.border-0 {
    border: 0 !important;
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(30, 46, 80, .09);
    border-radius: 0.25rem;
}

.icon-circle-lg {
    width: 4rem;
    height: 4rem;
}

.icon-circle {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 3.2rem;
    height: 3.2rem;
    border-radius: 50%;
}

.icon-circle-lg {
    width: 4rem;
    height: 4rem;
}

.icon-circle {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 3.2rem;
    height: 3.2rem;
    border-radius: 50%;
}

.border-0 {
    border: 0 !important;
}
</style>
