<template>
    <el-main class="d-flex justify-content-center px-3 py-3">
        <div :class="{'blur-background': showForm}">
            <el-table :data="list" :stripe="true" :border="true" height="500" class="w-100">
                <el-table-column prop="id" label="Id" width="50"/>
                <el-table-column prop="name" label="Name" width="120"/>
                <el-table-column prop="email" label="State" width="120"/>

                <el-table-column label="Status" width="120" #default="scope">
                    <el-select v-model="scope.row.status" @change="statusChange(scope.row)">
                        <el-option
                            v-for="(value, key) in transitions"
                            :key="key"
                            :label="value"
                            :value="key"
                        >
                            {{ value }}
                        </el-option>
                    </el-select>
                </el-table-column>

                <el-table-column fixed="right" label="Operations" min-width="150">
                    <template #default="scope">
                        <el-button type="warning" plain size="small" @click="updateForm(scope.row)">
                            Edit
                        </el-button>
                        <el-popconfirm
                            title="Are you sure to delete this user?"
                            @confirm="deleteForm(scope.row.id)">
                            <template #reference>
                                <el-button type="danger" plain size="small">Remove</el-button>
                            </template>
                        </el-popconfirm>
                    </template>
                </el-table-column>

            </el-table>
            <el-button type="primary" plain class="mt-4" style="width: 100%" @click="createForm">
                Add Item
            </el-button>
        </div>
        <UserForm
            v-if="showForm"
            @closeForm="closeForm"
            :isUpdate="isUpdate"
            :userData="currentUser"
        />
    </el-main>
</template>
<script>
import {mapActions, mapState} from "vuex";
import UserForm from "@/components/user/UserForm.vue";

export default {
    components: {UserForm},
    computed: {
        ...mapState('user', ['list', 'transitions'])
    },
    data() {
        return {
            showForm: false,
            isUpdate: false,
            currentUser: null,
        }
    },
    methods: {
        ...mapActions('user', ['index', 'delete', 'statuses', 'change_status']),
        createForm() {
            this.isUpdate = false;
            this.currentUser = undefined;
            this.showForm = true;
        },

        updateForm(user) {
            this.isUpdate = true;
            this.currentUser = user;
            this.showForm = true;
        },

        deleteForm(id) {
            this.delete(id).then(this.closeForm)
        },

        closeForm() {
            this.showForm = false;
            this.currentUser = null;
            this.index();
        },

        statusChange(data) {
            const formData = new FormData();
            formData.append('transition', data.status);
            this.change_status({id: data.id, data: formData}).then(() => {
                this.index();
            });
            this.$router.go({name: 'users.index'});
        }
    },
    created() {
        this.index()
        this.statuses()
    }
}
</script>
