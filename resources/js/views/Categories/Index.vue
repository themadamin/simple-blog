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
import "&/Category/Index.scss";

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
