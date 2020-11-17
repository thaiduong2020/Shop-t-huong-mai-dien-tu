<template>
<div class="col-md-8 " style="margin-left: 17%;background:#e4e4e4;padding-top: 2em;
">

    <h1>Thêm mới sản phẩm</h1>

    <el-alert style="width: 72%;margin: 0px 6em;font-size: 17px;" type="success" effect="dark" v-if="success">
        {{success}}
    </el-alert>

    <form @submit.prevent="createProduct" method="POST" enctype="multipart/form-data" :headers="{'x-csrf-token' : token}">
        <div class="form-group">
            <label>Tên sản phẩm</label>
            <input type="text" v-model="products.name" class="form-control-file " name="name">
            <div v-if="errors" class="alert alert-danger">
                {{ errors.name }}
            </div>
        </div>

        <div class="form-group">
            <label>chọn danh mục</label>
            <select class="form-control " v-model="categories.name">
                <option v-for="(cate) in categories" v-if="cate.parent_id !== 0" :value="cate.id">
                    {{cate.name}}
                </option>
            </select>
        </div>

        <div class="form-group">
            <label>chọn Thương hiệu</label>
            <select class="form-control ">
                <optgroup v-model="categories.name" v-for="(cate) in categories" v-if="cate.parent_id  !==0" :value=" cate.id" :label="cate.name">
                    <option v-for="(cate2) in categories" v-if="cate2.parent_id == cate.id" :value="cate2.id">{{cate2.name}}</option>
                </optgroup>
            </select>
        </div>
        <div class="form-group">
            <label>Gía sản phẩm</label>
            <input type="text" v-model="products.price" class="form-control-file " name="price">
            <div v-if="errors" class="alert alert-danger">
                {{ errors.price }}
            </div>
        </div>

        <div class="form-group">
            <label>Chọn ảnh sản phẩm</label>
            <input type="file" class="form-control-file " name="image" @change="onAvatarChange">
            <div v-if="errors" class="alert alert-danger">
                {{ errors.image }}
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Mô tả</label>
            <textarea class="form-control " v-model="products.description" name="description" rows="3"> </textarea>
            <div v-if="errors" class="alert alert-danger">
                {{ errors.description }}
            </div>
        </div>

        <div class="form-group">
            <label>Số lượng sản phẩm</label>
            <input type="number" v-model="products.quantity" class="form-control-file " name="quantity">
            <div v-if="errors" class="alert alert-danger">
                {{ errors.quantity }}
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-success">Thêm mới</button>
        </div>
    </form>
</div>
</template>

<script>
import Vue from 'vue'
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
            products: new Form({
                id_category: '',
                id_brand: '',
                name: '',
                price: '',
                description: '',
                quantity: '',
                image: '',

            }),
            brands: [],
            categories: [],
            categories2: [],
            token: '',
            success: '',
            errors: ''
        }
    },
    created() {

        this.token.csrfToken
        this.getCategories();
    },

    methods: {
        getCategories() {
            try {
                axios.get(`/api/categories`).then((res) => {
                    this.categories = res.data;
                })
            } catch (error) {

            }
        },
      
        createProduct() {
            this.products.id_category = this.categories.name
            this.products.id_brand = this.categories.name

            try {
                this.products.post('/api/products', {
                    transformRequest: [function (products, headers) {
                        return objectToFormData(products)
                    }],
                    onUploadProgress: e => {
                        // console.log(e)
                    }

                }).then(response => {
                    this.success = "Thêm mới sản phẩm thành công";
                    this.products.name = '';
                    this.products.id_category = '';
                    this.products.price = '';
                    this.products.description = '';
                    this.products.quantity = '';
                    this.products.image = '';
                    console.log(this.products.id_brand)

                }).catch((err) => {
                    console.log(err.request);
                    this.errors = err.response.data.errors;
                });

            } catch (err) {

            }
        },
        onAvatarChange(e) {
            const file = e.target.files[0]
            // Do some client side validation...
            this.products.image = file
        },
    },
}
</script>

<style>
form {
    padding: 1em 6em;
}

h1 {
    text-align: center
}
</style>
