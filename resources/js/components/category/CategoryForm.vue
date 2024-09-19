<template>
    <div class="popup-form">
        <div class="overlay" @click="closeForm"></div>
            <div class="container py-5 h-100">
                <div class="row justify-content-center align-items-center h-100">
                    <div class="col-12 w-50 col-xl-7">
                        <div class="card shadow-lg card-registration">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="mb-2 pb-2 pb-md-0 mb-md-5">
                                    {{ formText() }} Category
                                </h3>
                                <DynamicForm :schema="formSchema" :submit-text="formText()" @onSubmit="handleSubmit">
                                    <template v-slot:delete>
                                        <button class="btn btn-danger" @click="deleteCategory(this.categoryData.id)">
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
import '&/Category/CategoryForm.scss';
import * as Yup from "yup";

export default {
    components: {DynamicForm},
    props: {
        categoryData: {
            type: Object,
            default: (() => ({id: null, name: null, thumbnail: null}))
        },
        isUpdate: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            formSchema: {
                fields: [
                    {
                        label: 'Category name',
                        name: 'name',
                        as: 'input',
                        value: this.categoryData.name,
                        rules: Yup.string().required()
                    },
                    {
                        label: 'Thumbnail',
                        name: 'thumbnail',
                        as: 'input',
                        type: 'file',
                    }
                ]
            }
        };
    },
    methods: {
        ...mapActions('category', ['create', 'update', 'delete']),

        handleSubmit(data) {
            const formData = new FormData();
            formData.append('name', data.name);

            if (data.thumbnail) {
                formData.append('thumbnail', data.thumbnail);
            }

            if (this.isUpdate) {
                formData.append("_method", "PUT")
                this.update({id: this.categoryData.id, data: formData}).then(() => {
                    this.closeForm();
                });
            } else {
                this.create(formData).then(() => {
                    this.closeForm();
                });
            }
        },

        deleteCategory(id) {
            this.delete(id).then(() => {
                this.closeForm();
            });
        },

        closeForm() {
            this.$emit('closeForm');
            this.$router.push({name: 'categories.index'});
        },
        formText() {
            return this.isUpdate ? 'Update' : 'Create';
        }
    }
};
</script>


