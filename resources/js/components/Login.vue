<template>
    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 w-50 col-xl-7">
                    <div class="card shadow-lg card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Login Form</h3>
                            <form class="d-flex flex-column" @submit.prevent="loginUser">
                                <div class="row">
                                    <div class="mb-4 pb-2">

                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="email">Email</label>
                                            <input type="email" id="email" v-model="email"
                                                   class="form-control form-control-lg"/>
                                        </div>

                                    </div>
                                </div>

                                <div class="row">
                                    <div class="mb-4">

                                        <div data-mdb-input-init class="form-outline">
                                            <label class="form-label" for="password">Password</label>
                                            <input type="password" id="password" v-model="password"
                                                   class="form-control form-control-lg"/>
                                        </div>

                                    </div>
                                </div>

                                <div class="mt-4 pt-2">
                                    <input data-mdb-ripple-init class="btn btn-primary btn-lg" type="submit"
                                           value="Submit"/>
                                </div>

                            </form>

                            <div class="mt-2 d-flex align-items-center">
                                <span>Not registered yet ?</span>
                                <button class="btn text-primary" @click="$emit('toggleRegister')">Register</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import {mapActions, mapMutations, mapState} from "vuex";

export default {
    computed: {
        ...mapState('auth', [
            'form'
        ]),
        email: {
            get() {
                return this.form.email;
            },
            set(value) {
                this.setFormField({field: 'email', value});
            }
        },
        password: {
            get() {
                return this.form.password;
            },
            set(value) {
                this.setFormField({field: 'password', value});
            }
        },
    },

    methods: {
        ...mapMutations('auth',['setFormField']),

        ...mapActions('auth', ['login']),
        loginUser() {
            this.login().then(() => {
                this.$router.push({name: 'home'})
            })
        }
    }
}
</script>


<style scoped>
</style>
