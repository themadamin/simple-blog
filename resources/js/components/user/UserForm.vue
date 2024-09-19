<template>
    <div class="popup-form">
        <div class="overlay" @click="closeForm"></div>
            <div class="container py-5 h-100">
                <div class="row justify-content-center align-items-center h-100 ">
                        <div class="card shadow-lg card-registration w-50">
                            <div class="card-body p-4 p-md-5">
                                <h3 class="mb-2 pb-2 pb-md-0 mb-md-5">
                                    {{ formText() }} User
                                </h3>
                                <DynamicForm :schema="passSchema()" :submit-text="formText()" @onSubmit="handleSubmit"/>
                            </div>
                        </div>
                </div>
            </div>
    </div>
</template>
<script>
import DynamicForm from "@/components/DynamicForm.vue";
import * as Yup from "yup";
import {mapActions} from "vuex";

export default {
    components: {DynamicForm},
    props: {
        userData: {
            type: Object,
            default: (() => ({id: null, name: null, email: null, password: null}))
        },
        isUpdate: {
            type: Boolean,
            default: false
        }
    },
    data() {
        return {
            schema: {
                fields: [
                    {
                        label: 'Name',
                        name: 'name',
                        as: 'input',
                        value: this.userData.name,
                        rules: Yup.string().required()
                    },
                    {
                        label: 'Email',
                        name: 'email',
                        as: 'input',
                        value: this.userData.email,
                        rules: Yup.string().email()
                    }
                ]
            }
        };
    },
    methods: {
        ...mapActions('user', ['create', 'update', 'delete']),

        handleSubmit(data) {
            const formData = new FormData();
            formData.append('name', data.name);
            formData.append('email', data.email);

            if (!this.isUpdate){
                formData.append('password', data.password)
                formData.append('password_confirmation', data.password)
            }

            if (this.isUpdate) {
                formData.append('_method', 'PUT');
                this.update({id: this.userData.id, data: formData}).then(() => {
                    this.closeForm();
                });
            } else {
                this.create(formData).then(() => {
                    this.closeForm();
                });
            }
        },

        closeForm() {
            this.$emit('closeForm');
            this.$router.push({name: 'users.index'});
        },

        formText() {
            return this.isUpdate ? 'Update' : 'Create';
        },

        passSchema() {
          if (this.isUpdate){
              return this.schema
          }
            this.schema.fields.push(
                {
                    label: 'Password',
                    name: 'password',
                    as: 'input',
                    type: 'password',
                    rules: Yup.string().required()
                }
            )
            return this.schema;
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
