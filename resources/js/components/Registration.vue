<template>
    <section class="vh-100 w-100">
        <div class="container py-5 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 w-50 col-xl-7">
                    <div class="card shadow-lg card-registration" style="border-radius: 15px;">
                        <div class="card-body p-4 p-md-5">
                            <h3 class="mb-2 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                            <DynamicForm :schema="formSchema" submit-text="Register" @onSubmit="register"/>
                            <div class="mt-2 d-flex align-items-center">
                                <span>Already have account ?</span>
                                <button class="btn text-primary" @click="$emit('toggleLogin')">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import {mapActions} from "vuex";
import DynamicForm from "@/components/DynamicForm.vue";
import * as Yup from "yup";

export default {
    components: {DynamicForm},
    data(){
        return{
            formSchema: {
                fields: [
                    {
                        label: 'Name',
                        name: 'name',
                        as: 'input',
                        rules: Yup.string().required().min(5)
                    },
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
                    },
                    {
                        label: 'Password confirmation',
                        name: 'password_confirmation',
                        as: 'input',
                        type: 'password',
                        rules: Yup.string().required().min(6)
                    },
                ]

            }
        }
    },
    methods: {
        ...mapActions('auth', ['registration']),
        register(data) {
            const formData = new FormData();
            formData.append('name', data.name);
            formData.append('email', data.email);
            formData.append('password', data.password);
            formData.append('password_confirmation', data.password_confirmation);

            this.registration(formData).then(() => {
                this.$router.push({name: 'home'})
            })
        },
    },
}
</script>
