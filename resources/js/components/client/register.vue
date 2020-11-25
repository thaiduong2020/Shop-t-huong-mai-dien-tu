<template>
<div>
    <div  class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="float:right">
                <button type="button" class="btn btn-primary" @click="checkCC()"  >
                    Đăng nhập
                </button>
                <button type="button" class="btn btn-primary" @click="checkCC2()"  >
                    Đăng ký
                </button>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div v-if="login" class="modal-body">
                    <h5 class="modal-title" id="exampleModalLabel">Đăng nhập</h5>
                  
                <div class="modal-body">
                    <form method="POST" :headers="{'x-csrf-token' : token}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" v-model="logins.email"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mật khẩu</label>
                            <input type="password" v-model="logins.password" class="form-control">
                        </div>
                   

                    </form>
                </div>
                        <div  v-if="login">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" @click.prevent="Login()" class="btn btn-primary">Đăng nhập</button>
            </div>
            </div>
         

                <div v-if="regis" class="modal-body">
                    <h5 class="modal-title" id="exampleModalLabel">Đăng ký</h5>
                  
                <div class="modal-body">
                    <div v-if="success" class="alert alert-success" role="alert">
                        {{ success }}
                    </div>
                    <form method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Họ và tên</label>
                            <input type="name" v-model="users.name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" v-model="users.email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mật khẩu</label>
                            <input type="password" v-model="users.password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="phone" v-model="users.phone" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="address" v-model="users.address" class="form-control">
                        </div>

                    </form>
                </div>
            </div>
            <div class="modal-footer" v-if="regis">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" @click.prevent="addUser()" class="btn btn-primary">Đăng nhập</button>
            </div>

        </div>
    </div>
</div>



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
                this.success = "Đăng ký tài khoản thành công"
                this.users.name = '';
                this.users.email = '';
                this.users.password = '';
                this.users.phone = '';
                this.users.address = '';
            }).catch()
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
