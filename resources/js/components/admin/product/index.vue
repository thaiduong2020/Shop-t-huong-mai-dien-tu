<template>
<div>
    <el-table :data="products" ref="multipleTable" style="width: 100%" v-loading="loading">
        <el-table-column label="" width="40">
            <input style="margin: -0.4em 0.5em;" :value="products.id" :checked="products.checked" v-model="products.checked" class="form-check-input" type="checkbox" value="" id="defaultCheck1">
        </el-table-column>
        <el-table-column label="id" width="40" prop="id">
        </el-table-column>

        <el-table-column label="Images" width="180">
            <template slot-scope="scope">
                <img class="img" :src="'/'+scope.row.image" alt="">
            </template>
        </el-table-column>

        <el-table-column label="Name" width="180">
            <template slot-scope="scope">
                <el-popover trigger="hover" placement="top">
                    <p> {{ scope.row.name }}</p>
                    <div slot="reference" class="name-wrapper">
                        <el-tag size="medium">{{ scope.row.name }}</el-tag>
                    </div>
                </el-popover>
            </template>
        </el-table-column>

        <el-table-column label="Price" width="100">
            <template slot-scope="scope">
                <span style="margin-left: 10px">{{ formatPrice(scope.row.price) }}</span>
            </template>
        </el-table-column>

        <el-table-column label="Description" width="180">
            <template slot-scope="scope">
                <span class="span" style="margin-left: 10px">{{ scope.row.description }}</span>
            </template>
        </el-table-column>

        <el-table-column label="Quantity" width="100">
            <template slot-scope="scope">
                <span style="margin-left: 10px">{{ scope.row.quantity }}</span>
            </template>
        </el-table-column>

        <el-table-column label="Operations">
            <template slot-scope="scope">
                <el-button size="mini" @click="editData(scope.row.id)" data-toggle="modal" data-target="#exampleModal">Edit</el-button>
                <el-button size="mini" type="danger" @click="deleteData(scope.row.id)">Delete</el-button>
            </template>
        </el-table-column>

    </el-table>
    <div class="childrent">
        <button type="button" @click="checkAll(true)" class="btn btn-danger">chọn tất cả</button>

        <button type="button" @click="checkAll(false)" class="btn btn-danger">bỏ tất cả</button>

        <button type="button" @click="dellALL()" class="btn btn-danger">xóa tất cả</button>
        <el-pagination background layout="prev, pager, next" :total="total" :current-page="currentPage" :page-size="4" @current-change="changePage">

        </el-pagination>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><b>Cập nhật sản phẩm :</b> <u>{{product.editName}}</u></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" enctype="multipart/form-data" :headers="{'x-csrf-token' : token}">
                        <div class=" form-group">
                            <label for="">Tên sản phẩm</label>
                            <input type="text" v-model="product.editName" class="form-control" name="name" :class="{ 'is-invalid': product.errors.has('editName') }">
                            <div v-if="errors" class="alert alert-danger" role="alert">
                                {{ errors.name }}
                            </div>

                        </div>
                        <div class="form-group">
                            <label>chọn danh mục</label>
                            <select class=" custom-select" v-model="product.editId_categories">
                                <option selected>123</option>
                                <option v-for="(cate) in categories" :value="cate.id">{{ cate.name }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Chọn ảnh sản phẩm</label>
                            <input type="file" class="form-control-file " name="image" @change="onAvatarChange">
                        </div>
                        <div class=" form-group">
                            <label for="exampleFormControlInput1">Giá sản phẩm</label>
                            <input type="number" v-model="product.editPrice" class="form-control" id="price">
                            <div v-if="errors" class="alert alert-danger" role="alert">
                                {{ errors.price }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Số lượng sản phẩm</label>
                            <input type="number" v-model="product.editQuantity" class="form-control" id="quantity">
                            <div v-if="errors" class="alert alert-danger" role="alert">
                                {{ errors.quantity }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Mô tả</label>
                            <textarea class="form-control" v-model="product.editDescription" id="description" rows="3"></textarea>
                            <div v-if="errors" class="alert alert-danger" role="alert">
                                {{ errors.description }}
                            </div>
                        </div>

                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" @click.prevent="updateData()" class="btn btn-primary">Cập nhật sản phẩm</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</template>

<script>
import Vue from 'vue'
import Element from 'element-ui'
import Pagination from 'el-pagination/Pagination'

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
export default {
    data() {
        return {
            product: new Form({
                id: '',
                editId_categories: '',
                editName: '',
                editPrice: '',
                editDescription: '',
                editQuantity: '',
                editImage: '',
            }),
            currentPage: 1,
            total: 0,
            loading: false,

            products: [],
            categories: [],
            errors: '',
            token: '',
            success: '',
            dismiss: ''

        }
    },
    created() {
        this.token.csrfToken
        this.getData();
        this.getDataCategories()
        console.log(this.products.image)
    },
    methods: {
        //get data products
        getData() {
            this.loading = true;
            axios.get(`/api/products?limit=${this.pageSize}&page=${this.currentPage}`).then((res) => {
                if (res.status === 200) {
                    this.products = res.data.data
                    this.total = res.data.total;
                    console.log(res.data)

                }
                this.loading = false;

            }).catch((err) => {
                console.log(err);
            })
        },
        //get data category
        getDataCategories() {
            axios.get(`/api/categories`).then((res) => {
                if (res.status === 200) {
                    this.categories = res.data.data;
                }
            }).catch((err) => {})
        },
        //delete data products
        deleteData(id) {
            if (confirm('Bạn có chắc muốn xóa sản phẩm!')) {
                try {
                    axios.delete(`/api/products/` + id).then((res) => {
                        this.getData()
                    }).catch((err) => {
                        console.log(err);
                    })
                } catch (error) {

                }
            }
        },
        // edit data products
        editData(id) {
            axios.get(`/api/products/` + id).then((res) => {
                this.product.id = res.data.id;
                this.product.editName = res.data.name;
                this.product.editId_categories = res.data.id_category;
                this.product.editPrice = res.data.price;
                this.product.editImage = res.data.image;
                this.product.editQuantity = res.data.quantity;
                this.product.editDescription = res.data.description;
            })
        },
        updateData() {
            axios.put(`/api/products/` + this.product.id, {

                id: this.product.id,
                id_category: this.product.editId_categories,
                name: this.product.editName,
                price: this.product.editPrice,
                description: this.product.editDescription,
                quantity: this.product.editQuantity,
                image: this.product.editImage,
                transformRequest: [function (products, headers) {
                    return objectToFormData(product)
                }],
            }).then((res) => {
                this.getData();
                this.success = "Cập nhật sản phẩm thành công!";
            }).catch((error) => {
                this.errors = error.response.data.errors;
            })
        },
        onAvatarChange(e) {
            const file = e.target.files[0]
            // Do some client side validation...
            this.products.image = file
        },

        formatPrice(value) {
            return Intl.NumberFormat().format(value)
        },
        changePage(page) {
            this.currentPage = page;
            this.getData();
            console.log(this.pageSize);
        },
        checkAll: function (flag) {
            this.products.forEach(product => {
                product.checked = flag
            })
        },
    },
    watch: {
        image(val) {
            console.log("image", val)
        }
    }

}
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
