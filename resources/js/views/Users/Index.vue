<template>
    <el-main class="d-flex justify-content-center px-3 py-3">
        <div  :class="{'blur-background': showForm}">
            <el-table :data="list" :stripe="true" :border="true" height="500" class="w-100">
                <el-table-column prop="id" label="Id" width="50"/>
                <el-table-column prop="name" label="Name" width="120"/>
                <el-table-column prop="email" label="State" width="120"/>

                <el-table-column #default="scope" label="Verified" width="120">
                    <el-tag type="success" v-if="scope.row.verified">
                        Verified
                    </el-tag>
                    <el-tag type="warning" v-else>Not verified</el-tag>
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
        ...mapState('user', ['list'])
    },
    data() {
        return {
            showForm: false,
            isUpdate: false,
            currentUser: null,
        }
    },
    methods: {
      ...mapActions('user', ['index', 'delete']),
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
    },
    created() {
        this.index()
    }
}
</script>
<style scoped>
.blur-background {
    filter: blur(5px);
    transition: filter 0.3s ease;
}
</style>
