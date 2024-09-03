<template>
    <section class="pt-8 pt-md-9">
        <div class="container" :class="{'blur-background': showForm}">


            <!-- Categories -->
            <div class="row mt-6">
                <div class="d-flex justify-content-between col-12 mb-4">
          <span class="d-flex align-items-center badge bg-pastel-primary text-primary text-uppercase-bold-sm">
            Project categories
          </span>
                    <button @click="createForm" class="btn btn-primary">Create</button>
                </div>

                <!-- Category -->
<!--
                RouterLink :to="{path: `/categories/${category.id}`}"
-->
                <div class="col-md-3 mb-4 btn" v-for="category in list" :key="category.id" @click="updateForm(category)">
                    <a class="card align-items-center text-decoration-none border-0 hover-lift-light py-4">
                        <span class="icon-circle icon-circle-lg bg-pastel-primary text-primary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="512" height="512"
                              viewBox="0 0 512 512"><title>ionicons-v5-c</title><polyline
                             points="352 144 464 144 464 256"
                             style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></polyline><path
                             d="M48,368,169.37,246.63a32,32,0,0,1,45.26,0l50.74,50.74a32,32,0,0,0,45.26,0L448,160"
                             style="fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:32px"></path></svg>
                        </span>
                        <span class="text-dark mt-3">
                          {{category.name}}
                        </span>
                    </a>
                    </div>
            </div>

        </div>
        <CategoryForm v-if="showForm"
                      @closeForm="closeForm"
                      :isUpdate="isUpdate"
                      :categoryData="currentCategory"
        >Create</CategoryForm>
    </section>
</template>
<script>
import CategoryForm from "@/components/category/CategoryForm.vue";
import {mapActions, mapState} from "vuex";

export default {
    computed: {
        ...mapState('category', ['list']),
    },
    components: {
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
        getCategories() {
            this.index()
        },
        createForm(){
          this.isUpdate = false;
          this.currentCategory = null;
          this.showForm = true;
        },
        updateForm(category){
            this.isUpdate = true;
            this.currentCategory = category;
            this.showForm = true;
        },
        closeForm(){
            this.showForm = false;
            this.currentCategory = null;
            this.getCategories();
        }
    },
    created() {
        this.getCategories();
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

.shadow-sm {
    box-shadow: 0 .125rem .25rem rgba(35, 38, 45, .09) !important;
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

.border-0 {
    border: 0 !important;
}

.input-group-text {
    display: flex;
    align-items: center;
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #1f2c73;
    text-align: center;
    white-space: nowrap;
    background-color: #fff;
    border: 1px solid #dee2e6;
    border-radius: 0.25rem;
}
</style>

<!--            <h2 class="text-dark fw-normal">
                Get answers
            </h2>

            &lt;!&ndash; Form &ndash;&gt;
            <form class="mt-4">
                <div class="input-group input-group-lg shadow-sm">
          <span class="input-group-text border-0">
            <i class="fas fa-search fa-xs text-secondary mb-1"></i>
          </span>

                    <input type="text" class="form-control bg-white border-0 px-1" placeholder="Search help topics...">

                    <span class="input-group-text border-0 py-1 pe-2">
            <button type="submit" class="btn btn-primary text-uppercase-bold-sm">
              Search
            </button>
          </span>
                </div>
            </form>-->
