<template>
<div>

    <button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModal">
        Thêm mới vai trò
    </button>
    <!-- Modal -->

    <div  class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width:904px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới vai trò</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên vai trò </label>
                            <input type="text" v-model="role.name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div v-if="errors.name" class="alert alert-danger" role="alert">
                                                            {{ errors.name }}
                                                        </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" @click.prevent="AddRoles()" class="btn btn-primary">Thêm mới</button>
                </div>
            </div>
        </div>
    </div>
<div>
        <div v-if="dmcccc" class="modal fade" id="exampleModall" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">chỉnh sủa vai trò</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên vai trò</label>
                                <input type="text" v-model="role.name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div v-if="errors.name" class="alert alert-danger" role="alert">
                                                            {{ errors.name }}
                                                        </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" @click.prevent="updateRole()" class="btn btn-primary">Cập nhật</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table v-loading="loading" class="table table-bordered table-striped">

        <thead class="thead-light">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Vai trò</th>
                <th scope="col"></th>

            </tr>
        </thead>
        <tbody>

            <tr v-for="(role) in roles">
                <th style="width: 0.1%;" scope="row">{{role.id}}</th>
                <td style="width: 21%;">{{role.name}}</td>
                <td style="width: 37%;">
                    <el-button size="mini" @click="checkdmc(role.id)" data-toggle="modal" data-target="#exampleModall">
                        Sửa
                    </el-button>
                    <el-button size="mini" type="danger" @click="deleteRole(role.id)">Xóa</el-button>
                </td>

            </tr>

        </tbody>

    </table>
</div>
</template>

<script>
import Pagination from 'el-pagination/Pagination'
import Vue from 'vue'
import Element from 'element-ui'
import {
    Form,
    HasError,
    AlertError
} from 'vform'
import {
    objectToFormData
} from 'object-to-formdata'
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
Vue.use(Element)

export default {
    data() {
        return {
            role: new Form({
                id: '',
                name: '',
            }),
            roles: [],
            dmc: false,
            dmcc: false,
            dmccc: false,
            dmcccc: false,
            token: '',
            success: '',
            errors: '',
            loading: false,
        }
    },

    created() {
        this.token.csrfToken;
        this.getRoles();
    },

    methods: {
        // lấy dữ liệu từ api
        getRoles() {
            this.loading = true;
            axios.get(`/api/roles`).then((res) => {
                if (res.status === 200) {
                    this.roles = res.data;
                }
                this.loading = false;
            }).catch((err) => {})
        },
        AddRoles() {

            this.role.post('/api/roles', {
                transformRequest: [function (role, headers) {
                    return objectToFormData(role)
                }],
                onUploadProgress: e => {
                    // console.log(e)
                }
            }).then(response => {
                this.getRoles();
                this.success = "Thêm mới nhân viên thành công";
                this.role.name = '';

                this.errors = "";

            }).catch((err) => {
                this.errors = err.response.data.errors;
            });

        },
        updateRole() {

            axios.put(`/api/roles/` + this.role.id, {
                id: this.role.id,
                name: this.role.name,
                display_name: this.role.display_name
            }).then((res) => {
                this.role.name = res.data.name;
                this.role.display_name = res.data.display_name;
                this.success = "Thêm mới sản phẩm thành công";
                this.getRoles();
                this.errors = "";
                $('#exampleModall').modal('hide');
            }).catch((err) => {
                this.errors = err.response.data.errors;
            });
        },
        deleteRole(id) {
            if (confirm('Bạn có chắc muốn xóa!')) {
                axios.delete(`/api/roles/` + id).then((res) => {
                    this.getRoles()
                }).catch((err) => {

                })
            }
        },


        checkdmc(id) {
            axios.get(`/api/roles/` + id).then((res) => {
                this.role = res.data;
            }).catch((err) => {

            })
            this.dmcccc = true;
            this.dmcc = false;
        },

    },

}
</script>

<style lang="sass" scoped>

</style>
