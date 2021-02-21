<template>
<div>

                    <div v-if="success" class="alert alert-success" role="alert">
                        {{ success }}
                    </div>
                    <form method="POST" :headers="{'x-csrf-token' : token}">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Họ và tên</label>
                            <input type="name" v-model="users.name" class="form-control">
                            <div
                                    v-if="errors.name"
                                    class="alert alert-danger"
                                >
                                    {{ errors.name }}
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" v-model="users.email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div
                                    v-if="errors.email"
                                    class="alert alert-danger"
                                >
                                    {{ errors.email }}
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mật khẩu</label>
                            <input type="password" v-model="users.password" class="form-control">
                            <div
                                    v-if="errors.password"
                                    class="alert alert-danger"
                                 v-html="errors.password">

                                </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="phone" v-model="users.phone" class="form-control">
                            <div
                                    v-if="errors.phone"
                                    class="alert alert-danger"
                                >
                                    {{ errors.phone }}
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="address" v-model="users.address" class="form-control">
                            <div
                                    v-if="errors.address"
                                    class="alert alert-danger"
                                >
                                    {{ errors.address }}
                                </div>
                        </div>
                    </form>
                <button type="button" @click.prevent="addUser()" class="btn btn-primary">Đăng ký</button>


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
            users: new Form({
                name: '',
                email: '',
                password: '',
                phone: '',
                address: ''
            }),
            logins: new Form({
                email: '',
            password:"",
            }),
            success: '',
            regis: false,
            login: true,
            errors:'',
            token: '',
        }

    },
    created(){
        this.token.csrfToken
    },
    methods: {
        addUser() {
            this.users.post('/api/Register', {
                name: this.users.name,
                email: this.users.email,
                password: this.users.password,
                phone: this.users.phone,
                address: this.users.address,

            }).then((res) => {
                location.reload()
                this.success = "Đăng ký tài khoản thành công"
                this.users.name = '';
                this.users.email = '';
                this.users.password = '';
                this.users.phone = '';
                this.users.address = '';
            }).catch((err) =>{
                                this.errors = err.response.data.errors;
            })
        },
        Login() {
            this.logins.post('/api/Login', {
                email: this.logins.email,
                password: this.logins.password,

            }).then((res) => {
               router.reload()
            }).catch()
        },
        checkCC(){
             this.login = true;
             this.regis =  false;
        },
        checkCC2(){
            this.login = false;
             this.regis =  true;

        }
    }

}
</script>

<style >

</style>
