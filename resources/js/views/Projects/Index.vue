<template>
    <section class="py-5" >
        <div class="container px-5 mb-5" :class="{'blur-background': showForm}">
            <div class="text-center mb-5">
                <h1 class="fw-bold">
                    <span class="text-gradient">Projects</span>
                </h1>
            </div>

            <div class="mb-5 d-flex justify-content-center">
                <button @click="createForm" class="btn btn-outline-primary px-5 py-3 mx-2">Create</button>
            </div>

            <div class="row gx-5 justify-content-center">
                <div class="col-lg-11 col-xl-9 col-xxl-8">
                    <Card v-for="project in projects"
                          :key="project.id"
                          :project="project" @click="updateForm(project)"
                          type="button"
                    ></Card>
                </div>
            </div>
        </div>
        <ProjectForm
            v-if="showForm"
            @closeForm="closeForm"
            :isUpdate="isUpdate"
            :projectData="currentProject"
            :categories="categories"
        ></ProjectForm>
    </section>
</template>
<script>
import Card from '@/components/project/Card.vue'
import {mapActions, mapState} from "vuex";
import ProjectForm from "@/components/project/ProjectForm.vue";

export default {
    computed: {
        ...mapState('project', {projects: 'list'}),
        ...mapState('category', {categories: 'list'}),
    },
    data(){
        return {
            showForm: false,
            isUpdate: false,
            currentProject: null,
        }
    },
    components: {
        ProjectForm,
        Card
    },
    methods: {
        ...mapActions('project', {getProjects: 'index'}),
        ...mapActions('category', {getCategories: 'index'}),
        createForm(){
            this.isUpdate = false;
            this.currentProject = undefined;
            this.showForm = true;
        },
        updateForm(category){
            this.isUpdate = true;
            this.currentProject = category;
            this.showForm = true;
        },
        closeForm(){
            this.showForm = false;
            this.currentProject = null;
            this.getProjects();
        }
    },
    created() {
        this.getProjects()
        this.getCategories()
    }
}
</script>

<style scoped>

.text-gradient {
    background: -webkit-linear-gradient(315deg, #1e30f3 0%, #e21e80 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.blur-background {
    filter: blur(5px);
    transition: filter 0.3s ease;
}
</style>
