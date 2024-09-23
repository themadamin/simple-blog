<template>
    <div class="popup-form">
        <div class="overlay" @click="closeForm"></div>
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 w-50 col-xl-7">
                    <div class="card shadow-lg card-registration">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-2 pb-2 pb-md-0 mb-md-5">
                                 {{formTitle()}} Project
                            </h3>
                            <DynamicForm :schema="formSchema" :submit-text="formTitle()" @onSubmit="handleSubmit">
                                <template v-slot:selection>
                                    <CategorySelect :categories="categories" @on-select="selectedCategory"/>
                                </template>
                                <template v-slot:delete>
                                    <button class="btn btn-danger" @click="deleteProject(this.projectData.id)">
                                        Delete
                                    </button>
                                </template>
                            </DynamicForm>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {mapActions} from "vuex";
import DynamicForm from "@/components/DynamicForm.vue";
import "&/Projects/ProjectForm.scss";
import CategorySelect from "@/components/category/Select.vue"
import * as Yup from "yup";
export default {
    components: {DynamicForm, CategorySelect},
    props: {
        projectData: {
            type: Object,
            default: () => ({id: null, category_id: null, title: null, body: null, thumbnail: null})
        },
        isUpdate: {
            type: Boolean,
            default: false
        },
        categories: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            formSchema: {
                fields: [
                    {
                        label: 'Project title',
                        name: 'title',
                        as: 'input',
                        value: this.projectData.title,
                        rules: Yup.string().required()
                    },
                    {
                        label: 'Project body',
                        name: 'body',
                        as: 'input',
                        value: this.projectData.body,
                        rules: Yup.string().required()
                    },
                    {
                        label: 'Thumbnail',
                        name: 'thumbnail',
                        as: 'input',
                        type: 'file',
                    },
                ]
            },
            category: null
        };
    },
    methods: {
        ...mapActions('project', ['create', 'update', 'delete']),

        handleSubmit(data) {
            if (this.category === null) return;

            const formData = new FormData();
                formData.append('category_id', this.category);
                formData.append('title', data.title);
                formData.append('body', data.body);

            if (data.thumbnail) {
                formData.append('thumbnail', data.thumbnail);
            }

            if (this.isUpdate) {
                formData.append("_method", "PUT")
                this.update({id: this.projectData.id, data: formData})
                    .then(() => {
                        this.closeForm();
                    });
            } else {
                this.create(formData).then(() => {
                    this.closeForm();
                });
            }
        },

        deleteProject(id){
            this.delete(id).then(() => {
                this.closeForm();
            });
        },

        closeForm() {
            this.$emit('closeForm');
            this.$router.push({name: 'projects.index'})
        },

        formTitle() {
            return this.isUpdate ? 'Update' : 'Create';
        },

        selectedCategory(id){
            this.category = id;
        }
    },
}
</script>
