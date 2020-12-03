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
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <b>Thêm mới sản phẩm :</b> <u></u>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" :headers="{ 'x-csrf-token': token }">
                        <div class="form-group">
                            <label for="">Tên </label>
                            <input type="text" v-model="user.name" class="form-control-file " name="name">
                            <div v-if="errors" class="alert alert-danger">
                                {{ errors.name }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Email </label>
                            <input type="email" v-model="user.email" class="form-control-file " name="email">
                            <div v-if="errors" class="alert alert-danger">
                                {{ errors.name }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu</label>
                            <input type="password" v-model="user.password" class="form-control-file " name="password">
                            <div v-if="errors" class="alert alert-danger">
                                {{ errors.name }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>chọn vai trò</label>
                            <select v-model="role_id" class="form-control" name="roles[]" multiple="multiple">
                                <option v-for="(role) in roles" :value="role.id">{{ role.display_name }}</option>
                            </select>
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
            <tr v-for="(user) in users">
                <th style="width: 0.1%;" scope="row">{{user.id}}</th>
                <td style="width: 21%;" >{{user.name}}</td>
                <td style="width: 21%;">{{user.email}}</td>
                
                <td style="width: 37%;">
                    <el-button size="mini" @click="editData(user.id)" data-toggle="modal" data-target="#exampleModal">
                        Edit
                    </el-button>
                    <el-button size="mini" type="danger" @click="deleteData(user.id)">Delete</el-button>
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
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        <b>Cập nhật sản phẩm :</b> <u></u>
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" :headers="{ 'x-csrf-token': token }">
                        <div class="form-group">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" class="form-control" name="name" />
                            <div v-if="errors" class="alert alert-danger" role="alert">
                                {{ errors.name }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label>chọn danh mục</label>
                            <select class="custom-select">
                                <option>
                                </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>chọn Thương hiệu</label>
                            <select class="custom-select">

                                <option>
                                </option>

                            </select>
                        </div>
                    </form>
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
    data() {
        return {
            user: new Form([
                'name',
                'email',
                'password',
                'role_id' ,
            ]),
            role_id: [],
            users: [],
            roles:[],
            currentPage: 1,
            total: 0,
            loading: false,

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
    },
    methods: {
        //get data products
        getData() {
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
                this.user.role_id = this.role_id;
                this.user.post('/api/users', {
                    transformRequest: [function (user, headers) {
                        return objectToFormData(user)
                    }],
                    onUploadProgress: e => {
                        console.log(e)
                    }

                }).then(response => {
                    this.success = "Thêm mới sản phẩm thành công";
                   
                    this.user.name = '';
                    this.user.email = '';
                    this.user.password = '';
                    this.user.role_id = '';
                    this.getData();
                   
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
            axios.get(`/api/products/` + id).then((res) => {
                this.product.id = res.data.id;
                this.product.editName = res.data.name;
                this.product.editId_categories = res.data.id_category;
                this.product.editId_brand = res.data.id_brand;
                this.product.editPrice = res.data.price;
                this.product.editImage = res.data.image;
                this.product.editQuantity = res.data.quantity;
                this.product.editDescription = res.data.description;
            });
        },
        updateData() {
            axios
                .put(`/api/products/` + this.product.id, {
                    id: this.product.id,
                    id_category: this.product.editId_categories,
                    id_brand: this.product.editId_brand,
                    name: this.product.editName,
                    price: this.product.editPrice,
                    description: this.product.editDescription,
                    quantity: this.product.editQuantity,
                    image: this.product.editImage,
                    transformRequest: [
                        function (products, headers) {
                            return objectToFormData(product);
                        },
                    ],
                })
                .then((res) => {
                    this.getData();
                    this.success = "Cập nhật sản phẩm thành công!";
                })
                .catch((error) => {
                    this.errors = error.response.data.errors;
                    console.log(this.product.editId_brand);

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
