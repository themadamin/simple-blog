<template>
    <!--    <section class="vh-100 w-100">-->
    <div class="popup-form">
        <div class="overlay" @click="closePopup"></div>
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 w-50 col-xl-7">
                    <div class="card shadow-lg card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-2 pb-2 pb-md-0 mb-md-5">Create new category</h3>
                            <form class="d-flex flex-column" @submit.prevent="updateCategory">

                                <div class="row">
                                    <div class="mb-2">

                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="title">Name</label>
                                            <input type="text" v-model="name" id="name"
                                                   class="form-control form-control-lg"/>
                                        </div>

                                    </div>
                                </div>


                                <div class="row">
                                    <div class="mb-2 pb-2">

                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="img">Image</label>
                                            <input type="file" id="img" class="form-control form-control-lg"/>
                                        </div>

                                    </div>
                                </div>

                                <div class="d-flex justify-content-between align-items-end">
                                    <div>
                                        <button class="btn btn-danger btn-lg">Delete</button>
                                    </div>
                                    <div class="mt-4 pt-2">
                                        <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit"
                                               value="Submit"/>
                                    </div>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--    </section>-->
</template>
<script>
import {mapActions, mapMutations, mapState} from "vuex";

export default {
    props: {
        id: {
            type: String,
            required: true
        },
        oldCategory: {
            type: Object,
            required: true
        }
    },
    computed: {
        ...mapState('category', ['name', 'thumbnail']),
        name: {
            get() {
                return this.name;
            },
            set(value) {
                return this.setCategoryValue({field: 'name', value});
            }
        },
        thumbnail: {
            get() {
                return this.thumbnail;
            },
            set(value) {
                this.setCategoryValue({field: 'thumbnail', value})
            }
        }
    },
    methods: {
        ...mapMutations('category', ['setCategoryValue']),
        ...mapActions('category', ['update']),

        updateCategory() {
            this.update().then(() => {
                this.$router.push({name: 'categories.index'});
                this.closePopup();
            })
        },

        closePopup() {
            this.$emit('closeUpdate');
        },
    }
}
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
