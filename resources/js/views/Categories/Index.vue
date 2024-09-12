<template>
    <section class="pt-8 pt-md-9">
        <div class="container" :class="{'blur-background': showForm}">

            <div class="row mt-6">
                <div class="d-flex justify-content-between col-12 mb-4">
                      <span class="d-flex align-items-center badge bg-pastel-primary text-primary text-uppercase-bold-sm">
                        Project categories
                      </span>
                      <button @click="createForm" class="btn btn-primary">Create</button>
                </div>

                <div class="col-md-3 mb-4 btn" v-for="category in list" :key="category.id"
                     @click="updateForm(category)">
                    <CategoryCard :category="category"/>
                </div>
            </div>

        </div>
        <CategoryForm v-if="showForm"
                      @closeForm="closeForm"
                      :isUpdate="isUpdate"
                      :categoryData="currentCategory"
        >Create
        </CategoryForm>

    </section>
</template>
<script>
import CategoryForm from "@/components/category/CategoryForm.vue";
import {mapActions, mapState} from "vuex";
import CategoryCard from "@/components/category/CategoryCard.vue";

export default {
    computed: {
        ...mapState('category', ['list']),
    },
    components: {
        CategoryCard,
        CategoryForm
    },
    data() {
        return {
            showForm: false,
            isUpdate: false,
            currentCategory: null,
        }
    },
    methods: {
        ...mapActions('category', ['index']),
        createForm() {
            this.isUpdate = false;
            this.currentCategory = undefined;
            this.showForm = true;
        },
        updateForm(category) {
            this.isUpdate = true;
            this.currentCategory = category;
            this.showForm = true;
        },
        closeForm() {
            this.showForm = false;
            this.currentCategory = null;
            this.index();
        },
    },
    created() {
        this.index();
    }
}
</script>
<style scoped>
body {
    margin-top: 20px;
    background: #f6f9fc;
}

.blur-background {
    filter: blur(5px);
    transition: filter 0.3s ease;
}


.bg-pastel-primary {
    background-color: #e9f3ff !important;
}

.mt-6 {
    margin-top: 4rem !important;
}

.mb-4 {
    margin-bottom: 1.5rem !important;
}

.badge {
    padding: 0.4rem 0.65rem 0.25rem;
}

.text-uppercase-bold-sm {
    text-transform: uppercase !important;
    font-weight: 500 !important;
    letter-spacing: 2px !important;
    font-size: .85rem !important;
}

.bg-pastel-primary {
    background-color: #e9f3ff !important;
}


.bg-pastel-primary {
    background-color: #e9f3ff !important;
}

.icon-circle[class*=text-] [fill]:not([fill=none]), .icon-circle[class*=text-] svg:not([fill=none]), .svg-icon[class*=text-] [fill]:not([fill=none]), .svg-icon[class*=text-] svg:not([fill=none]) {
    fill: currentColor !important;
}

.icon-circle-lg > svg {
    width: 2rem;
    height: 2rem;
}

.input-group:not(.has-validation) > .dropdown-toggle:nth-last-child(n+3), .input-group:not(.has-validation) > :not(:last-child):not(.dropdown-toggle):not(.dropdown-menu) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}

.input-group-lg > .btn, .input-group-lg > .form-control, .input-group-lg > .form-select, .input-group-lg > .input-group-text {
    padding: 0.5rem 1rem;
    font-size: 1.25rem;
    border-radius: 0.3rem;
}

</style>
