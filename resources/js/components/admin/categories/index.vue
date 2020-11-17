<template>
<div>

    <button type="button" class="btn btn-primary" @click="checkC()" data-toggle="modal" data-target="#exampleModal">
        Thêm mới danh mục cha
    </button>
    <button type="button" class="btn btn-primary" @click="checkCC()" data-toggle="modal" data-target="#exampleModal">
        Thêm mới danh mục con
    </button>
    <!-- Modal -->
    <div>
        <div v-if="dmc" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <el-alert style="width: 72%;margin: 0px 6em;font-size: 17px;" type="success" effect="dark" v-if="success">
                        {{success}}
                    </el-alert>
                    <div class="modal-body">
                        <form method="POST" :headers="{'x-csrf-token' : token}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="email" v-model="categorie.name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <div v-if="errors" class="alert alert-danger" role="alert">
                                    {{ errors.name }}
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" @click.prevent="AddCategories()" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div v-if="dmcc" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <el-alert style="width: 72%;margin: 0px 6em;font-size: 17px;" type="success" effect="dark" v-if="success">
                        {{success}}
                    </el-alert>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="email" v-model="categorie.name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label>chọn danh mục</label>
                                <select class="form-control " v-model="categories.name">
                                    <option v-for="(cate) in categories" :value="cate.id">{{ cate.name }}</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" @click.prevent="AddCategories()" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div v-if="dmccc" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <el-alert style="width: 72%;margin: 0px 6em;font-size: 17px;" type="success" effect="dark" v-if="success">
                        {{success}}
                    </el-alert>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="email" v-model="categorie.name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" @click.prevent="updataData()" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div v-if="dmcccc" class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <el-alert style="width: 72%;margin: 0px 6em;font-size: 17px;" type="success" effect="dark" v-if="success">
                        {{success}}
                    </el-alert>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="email" v-model="categorie.name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label>chọn danh mục</label>
                                <select class="form-control " v-model="categories.name">
                                    <option v-for="(cate) in categories" :value="cate.id">{{ cate.name }}</option>
                                </select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" @click.prevent="updataData()" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table v-loading="loading" class="table table-bordered table-striped">

        <thead class="thead-light">
            <tr>
                <th scope="col">List category</th>

            </tr>
        </thead>
        <tbody>
            <ul class="list-group" v-for="(cate) in categories">
                <li v-if="cate.parent_id == 0" class="list-group-item col-md-12"><span>
                        <tr>
                            <th style="width: 0.1%;" scope="row">{{cate.id}}</th>
                            <td style="width: 21%;">{{cate.name}}</td>
                            <td style="width: 37%;">
                                <el-button size="mini" @click="checkdmc(cate.id)" data-toggle="modal" data-target="#exampleModal">
                                    Edit
                                </el-button>
                                <el-button size="mini" type="danger" @click="deleteData(cate.id)">Delete</el-button>
                            </td>

                        </tr>
                    </span>
                    <ul v-for="(cate2) in categories" class="list-group">
                        <li v-if="cate2.parent_id == cate.id" class="list-group-item col-md-12"><span>
                                <tr>
                                    <th style="width: 0.1%;" scope="row">{{cate2.id}}</th>
                                    <td style="width: 20.5%;">{{cate2.name}}</td>
                                    <td style="width: 37%;">
                                        <el-button size="mini" @click="checkdmcc(cate2.id)" data-toggle="modal" data-target="#exampleModal">
                                            Edit
                                        </el-button>
                                        <el-button size="mini" type="danger" @click="deleteData(cate2.id)">Delete</el-button>
                                    </td>

                                </tr>
                            </span>
                            <ul v-for="(cate3) in categories" class="list-group">
                                <li v-if="cate3.parent_id == cate2.id" class="list-group-item col-md-12">
                                    <tr>
                                        <th style="width: 0.1%;" scope="row">{{cate3.id}}</th>
                                        <td style="width: 20%;">{{cate3.name}}</td>
                                        <td style="width: 37%;">
                                            <el-button size="mini" @click="checkdmcc(cate3.id)" data-toggle="modal" data-target="#exampleModal">
                                                Edit
                                            </el-button>
                                            <el-button size="mini" type="danger" @click="deleteData(cate3.id)">Delete</el-button>
                                        </td>

                                    </tr>

                                </li>

                            </ul>
                        </li>

                    </ul>
                </li>
            </ul>
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
            categorie: new Form({
                id: '',
                name: '',
                parent_id: ''
            }),
            categories: [],
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
        this.getCategories();
    },

    methods: {
        // lấy dữ liệu từ api
        getCategories() {
            this.loading = true;
            axios.get(`/api/categories`).then((res) => {
                if (res.status === 200) {
                    this.categories = res.data;
                }
                this.loading = false;
            }).catch((err) => {})
        },
        AddCategories() {
            this.categorie.parent_id = this.categories.name;

            this.categorie.post('/api/categories', {
                transformRequest: [function (categorie, headers) {
                    return objectToFormData(categorie)
                }],
                onUploadProgress: e => {
                    // console.log(e)
                }
            }).then(response => {
                this.getCategories();
                this.success = "Thêm mới sản phẩm thành công";
                this.categorie.name = '';

            }).catch((err) => {
                this.errors = error.response.data.errors;
            });

        },
        updataData() {
            this.categorie.parent_id = this.categories.name;

            axios.put(`/api/categories/` + this.categorie.id, {
                id: this.categorie.id,
                name: this.categorie.name,
                parent_id: this.categorie.parent_id
            }).then((res) => {
                this.categorie.name = res.data.name;
                this.categorie.parent_id = res.data.parent_id;
                this.success = "Thêm mới sản phẩm thành công";
                this.getCategories();
            }).catch((err) => {

            })
        },
        deleteData(id) {
            if (confirm('Bạn có chắc muốn xóa!')) {
                axios.delete(`/api/categories/` + id).then((res) => {
                    this.getCategories()
                }).catch((err) => {

                })
            }
        },

        checkC() {
            this.dmc = true;
            this.dmcc = false;
        },
        checkCC() {
            this.dmc = false;
            this.dmcc = true;
        },
        checkdmc(id) {
            axios.get(`/api/categories/` + id).then((res) => {
                this.categorie = res.data;
            }).catch((err) => {

            })
            this.dmccc = true;
            this.dmcccc = false;
        },
        checkdmcc(id) {
            axios.get(`/api/categories/` + id).then((res) => {
                this.categorie = res.data;
            }).catch((err) => {

            })
            this.dmccc = false;
            this.dmcccc = true;
        }
    },

}
</script>

<style lang="sass" scoped>

</style>
