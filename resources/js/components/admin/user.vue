<template>
<div>
 <div class="content-header" style="    background: white; margin-bottom: 0.5em;">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4 style="float: left;" class="m-0">Quản lý thành viên</h4>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Quản lý thành viên</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                       <button type="button" style="background: #1e7e34; color: white" class="btn" @click="checkCC()" data-toggle="modal" data-target="#exampleModal">
        Thêm mới thành viên
    </button>
                </div>
            </div>

    <div v-if="dmcc" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:619px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <b>Thêm mới thành viên :</b> <u></u>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                     <form method="POST" enctype="multipart/form-data" :headers="{ 'x-csrf-token': token }">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên</label>
                                <input type="text" v-model="userr.name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                            <div v-if="errors.name" class="alert alert-danger" role="alert">
                                                            {{ errors.name }}
                                                        </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" v-model="userr.email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                            <div v-if="errors.email" class="alert alert-danger" role="alert">
                                                            {{ errors.email }}
                                                        </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu</label>
                                <input type="password" v-model="userr.password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                            <div v-if="errors.password" class="alert alert-danger" role="alert">
                                                            {{ errors.password }}
                                                        </div>
                            </div>
                            <div class="form-group">
                            <label>chọn vai trò</label>
                            <select class="form-control" v-model="role_id" >
                                    <option v-for="(role) in roles" :value="role.id" >
                                        {{role.name}}
                                    </option>
                                </select>
                                <div v-if="errors.role_id" class="alert alert-danger" role="alert">
                                {{ errors.role_id }}
                            </div>
                        </div>

                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Đóng
                        </button>
                        <button type="button" @click.prevent="createUser()" class="btn btn-primary">
                            Thêm mới
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table v-loading="loading" class="table table-bordered table-striped">
        <thead class="thead-light">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Tên thành viên</th>
                <th scope="col">email</th>
                <th scope="col">vai trò</th>
                <th scope="col"></th>

            </tr>
        </thead>
        <tbody>
            <tr v-for="(us) in users">
                <th style="width: 0.1%;" scope="row">{{us.id}}</th>
                <td style="width: 21%;" >{{us.name}}</td>
                <td style="width: 21%;">{{us.email}}</td>
                <td style="width: 21%; color:green" v-if="us.role_id !== 0">Quản trị viên</td>
                 <td style="width: 21%; " v-if="us.role_id == 0">Người dùng</td>
                <td style="width: 37%;">
                    <el-button size="mini" @click="editData(us.id)" v-if="us.id != user" data-toggle="modal" data-target="#exampleModall">
                        Sửa
                    </el-button>
                    <el-button size="mini" type="danger" v-if="us.id != user" @click="deleteData(us.id)">Xóa</el-button>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="childrent">
        <button type="button" @click="checkAll(true)" class="btn btn-danger">
            chọn tất cả
        </button>

        <button type="button" @click="checkAll(false)" class="btn btn-danger">
            bỏ tất cả
        </button>

        <button type="button" @click="dellALL()" class="btn btn-danger">
            xóa tất cả
        </button>
        <el-pagination background layout="prev, pager, next" :total="total" :current-page="currentPage" :page-size="4" @current-change="changePage">
        </el-pagination>
    </div>
    <div class="modal fade" id="exampleModall" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:619px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <b>Cập nhật người dùng :</b> <u></u>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" :headers="{ 'x-csrf-token': token }">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên</label>
                                <input type="text" v-model="useredit.name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                            <div v-if="errors.name" class="alert alert-danger" role="alert">
                                                            {{ errors.name }}
                                                        </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="email" v-model="useredit.email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                            <div v-if="errors.email" class="alert alert-danger" role="alert">
                                                            {{ errors.email }}
                                                        </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Mật khẩu</label>
                                <input type="password" v-model="useredit.password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
                            <div v-if="errors.password" class="alert alert-danger" role="alert">
                                                            {{ errors.password }}
                                                        </div>
                            </div>
                            <div class="form-group">
                            <label>chọn vai trò</label>
                            <select class="form-control" v-model="role_id2" >
                                    <option v-for="(role) in roles" :value="role.id" >
                                        {{role.name}}
                                    </option>
                                </select>
                                <div v-if="errors.role_id" class="alert alert-danger" role="alert">
                                {{ errors.role_id }}
                            </div>
                        </div>

                    </form>
                    -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Đóng
                        </button>
                        <button type="button" @click.prevent="updateData()" class="btn btn-primary">
                            Cập nhật sản phẩm
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>
<script>


</script>
<script>

import Vue from "vue";
import Element from "element-ui";
import Pagination from "el-pagination/Pagination";

import {
    Form,
    HasError,
    AlertError
} from "vform";
import {
    objectToFormData
} from "object-to-formdata";
Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);
export default {
             props: ['user'],
    data() {
        return {
            userr: new Form([
                'name',
                'email',
                'password',
                'role_id' ,
            ]),
            useredit: new Form({
                id: '',
                name: '',
                email: '',
                password: '',
                role_id: '',
            }),
            role_id: [],
            role_id2: [],
            role_user:[],
            users: [],
            roles:[],
            currentPage: 1,
            total: 0,
            loading: false,
            user: '',
            errors: "",
            token: "",
            success: "",
            dismiss: "",
            dmcc: false,
        };
    },
    created() {
        this.token.csrfToken;
        this.getData();
        // this.editData();
    },
    methods: {
        //get data products
        getData() {
            console.log(this.user);
            this.loading = true;
            axios
                .get(`/api/users?limit=${this.pageSize}&page=${this.currentPage}`)
                .then((res) => {
                    if (res.status === 200) {
                        this.users = res.data.user.data;
                        this.roles = res.data.roles;
                        this.total = res.data.total;
                        console.log(res.data.roles);
                    }
                    this.loading = false;
                })
                .catch((err) => {
                    console.log(err);
                });
        },
        //get data category

        createUser() {
            try {
                this.userr.role_id = this.role_id;
                this.userr.post('/api/users', {
                    transformRequest: [function (userr, headers) {
                        return objectToFormData(userr)
                    }],
                    onUploadProgress: e => {
                        console.log(e)
                    }

                }).then(response => {
                    this.success = "Thêm mới sản phẩm thành công";

                    this.userr.name = '';
                    this.userr.email = '';
                    this.userr.password = '';
                    this.userr.role_id = '';
                    this.errors = '';
                    this.getData();
                    $('#exampleModal').modal('hide');

                }).catch((err) => {
                    console.log(err.request);
                    this.errors = err.response.data.errors;
                });

            } catch (err) {

            }
        },
        //delete data products
        deleteData(id) {
            if (confirm("Bạn có chắc muốn xóa !")) {
                try {
                    axios
                        .delete(`/api/users/` + id)
                        .then((res) => {
                            this.getData();
                        })
                        .catch((err) => {
                            console.log(err);
                        });
                } catch (error) {}
            }
        },
        // edit data products
        editData(id) {
            axios.get(`/api/users/` + id).then((res) => {
                this.useredit.id = res.data.user.id;
                this.useredit.name = res.data.user.name;
                this.useredit.email = res.data.user.email;
                this.useredit.password = res.data.user.password;

                // console.log(res.data.role.display_name);
            }).catch();
        },
        updateData() {
                            this.useredit.role_id = this.role_id2;
            axios
                .put(`/api/users/` + this.useredit.id, {
                    id: this.useredit.id,
                    name: this.useredit.name,
                    email: this.useredit.email,
                    password: this.useredit.password,
                    role_id:  this.role_id2,
                    user_id: this.useredit.id,
                    transformRequest: [
                        function (useredit, headers) {
                            return objectToFormData(useredit);
                        },
                    ],
                })
                .then((res) => {
                    this.getData();
                    this.success = "Cập nhật sản phẩm thành công!";
                                        $('#exampleModall').modal('hide');
                                        this.errors = "";

                })
                .catch((error) => {
                    this.errors = error.response.data.errors;

                });
        },

        changePage(page) {
            this.currentPage = page;
            this.getData();
            console.log(this.pageSize);
        },
        checkAll: function (flag) {
            this.products.forEach((product) => {
                product.checked = flag;
            });
        },
        checkCC() {
            this.dmc = false;
            this.dmcc = true;
        },
    },
    watch: {
        image(val) {
            console.log("image", val);
        },
    },
};
</script>

<style>
.img {
    height: 100px;
    width: 100px;
}

button {
    border: none;
    background: yellow;
}

.childrent {
    min-width: 300px;
    background: #f5f7fa;
    padding: 25px;
    padding-left: 88px;
}
</style>
