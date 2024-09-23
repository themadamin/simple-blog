<template>
        <Form class="d-flex flex-column" @submit="handleSubmit">
            <div v-for="{ as, name, label, ...attrs } in schema.fields" :key="name" class="row mb-4 pb-2">
                <label :for="name" class="form-label">{{label}}</label>
                <Field :as="as"
                       :id="name" :name="name"
                       v-bind="attrs" class="form-control form-control-lg">
                    <slot name="selection"/>
                </Field>
                <ErrorMessage :name="name" class="text-danger"/>
            </div>
            <slot name="selection"/>
            <div class="mt-2 d-flex justify-content-between">
                <slot name="delete"/>
                <button class="btn btn-primary">{{this.submitText}}</button>
            </div>
        </Form>
</template>
<script>
import {Form, Field, ErrorMessage} from "vee-validate";

export default {
    //setFieldValue vee validate
    components: {
        ErrorMessage,
        Form,
        Field
    },
    props: {
        schema: {
            type: Object,
            required: true
        },
        submitText: {
            type: String,
            default: 'Submit',
        }
    },
    methods: {
        handleSubmit(values){
            this.$emit('onSubmit', values);
        }
    }
}
</script>
