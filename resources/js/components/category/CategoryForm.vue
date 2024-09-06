<template>
    <div class="popup-form">
        <div class="overlay" @click="closeForm"></div>
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 w-50 col-xl-7">
                    <div class="card shadow-lg card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-2 pb-2 pb-md-0 mb-md-5">
                                {{ isUpdate ? 'Update' : 'Create' }} Category
                            </h3>
                            <form class="d-flex flex-column"  @submit.prevent="handleSubmit">

                                <div class="row">
                                    <div class="mb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="name">Name</label>
                                            <input
                                                type="text"
                                                :value="category.name"
                                                @input="setLocalField('name', $event.target.value)"
                                                id="name"
                                                class="form-control form-control-lg"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-2 pb-2">
                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="thumbnail">Image</label>
                                            <input
                                                type="file"
                                                @change="handleFileUpload"
                                                id="thumbnail"
                                                class="form-control form-control-lg"
                                            />
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-end">
                                <div class="mt-4 pt-2">
                                    <input
                                        data-mdb-ripple-init
                                        class="btn btn-primary btn-lg"
                                        type="submit"
                                        :value="isUpdate ? 'Update' : 'Create'"
                                    />
                                </div>
                                    <div v-show="isUpdate">
                                        <button class="btn btn-lg btn-danger" @click="deleteCategory(this.categoryData.id)">Delete</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import {mapActions} from "vuex";

export default {
    props: {
        categoryData: {
            type: Object,
            default: () => ({ id: null, name: '', thumbnail: null })
        },
        isUpdate: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            category: { ...this.categoryData }
        };
    },
    methods: {
        ...mapActions('category', ['create', 'update', 'delete']),

        handleSubmit() {
            const formData = {
                name: this.category.name,
            }
            if (this.category.thumbnail) {
                formData.append('thumbnail', this.category.thumbnail);
            }

            if (this.isUpdate) {
                this.update({ id: this.categoryData.id, data: formData }).then(() => {
                    this.closeForm();
                    this.$router.push({ name: 'categories.index' });
                });
            } else {
                this.create(formData).then(() => {
                    this.closeForm();
                    this.$router.push({ name: 'categories.index' });
                });
            }
        },

        deleteCategory(id){
            this.delete(id).then(() => {
                this.closeForm();
                this.$router.push({ name: 'categories.index' });
            });
        },

        setLocalField(field, value) {
            this.category[field] = value;
        },

        handleFileUpload(event) {
            this.category.thumbnail = event.target.files[0];
        },

        closeForm() {
            this.$emit('closeForm');
        }
    }
};
</script>
<style scoped>
.popup-form {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;
}

.overlay {
    position: absolute;
    width: 100%;
    height: 100%;
}
</style>

