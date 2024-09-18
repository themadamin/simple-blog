<template>
    <section class="vh-100">
        <div class="container d-flex justify-content-center">
            <div class="align-items-center w-50 p-5 border rounded-4 shadow-lg">
                <h2 class="mb-3">Login here</h2>
                <DynamicForm :schema="formSchema" submit-text="Login" @onSubmit="loginUser"/>
                <div class="mt-2 d-flex align-items-center">
                    <span>Not registered yet ?</span>
                    <button class="btn text-primary" @click="$emit('toggleRegister')">Register</button>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import {mapActions} from "vuex";
import DynamicForm from "@/components/DynamicForm.vue";
import * as Yup from 'yup'

export default {
    components: {DynamicForm},
    data() {
        return {
            formSchema: {
                fields: [
                    {
                        label: 'Email Address',
                        name: 'email',
                        as: 'input',
                        rules: Yup.string().required().email()
                    },
                    {
                        label: 'Password',
                        name: 'password',
                        as: 'input',
                        type: 'password',
                        rules: Yup.string().min(6).required()
                    }
                ]

            }
        }
    },
    methods: {
        ...mapActions('auth', ['login']),

            loginUser(data) {
                const formData = new FormData();
                formData.append('email', data.email);
                formData.append('password', data.password);

                this.login(formData).then(() => {
                    this.$router.push({name: 'home'})
                })
        }
    }
}
</script>
