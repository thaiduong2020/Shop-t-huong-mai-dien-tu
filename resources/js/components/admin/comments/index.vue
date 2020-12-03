<template>
<div>

    <div class="content-header" style="    background: white; margin-bottom: 0.5em;">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 style="float: left;" class="m-0">Quản bình luận</h4>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Quản bình luận</li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>

            <!-- /.row -->
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <el-alert style="width: 57%;margin: 0px 6em;font-size: 17px;" type="success" effect="dark" v-if="success">
                        {{success}}
                    </el-alert>
            <form action="" method="post">
                <div class="form-group">
                    <input type="text" v-model="comment.content" class="form-control">
                </div>
                    <button type="submit"   @click.prevent="submit(comment.id)" class="form-control">Cập nhật</button>
            </form>
      </div>
      
    </div>
  </div>
</div>
    <table v-loading="loading" class="table table-bordered table-striped">
        <thead class="thead-light">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Tên nguoi dung</th>
                <th scope="col">id sản phẩm</th>
                <th scope="col">nội dung</th>
                <th scope="col"></th>

            </tr>
        </thead>
        <tbody>

            <tr v-for="(cmt) in comments">
                <th style="width: 0.1%;" scope="row">{{cmt.id}}</th>
                <td style="width: 21%;" v-for="(user) in users" v-if="user.id == cmt.id_user">{{user.name}}</td>
                <td style="width: 21%;">{{cmt.id_product}}</td>
                <td style="width: 21%;">{{cmt.content}}</td>
                <td style="width: 37%;">
                    <el-button size="mini" @click="edit(cmt.id)" data-toggle="modal" data-target="#exampleModal">
                        Edit
                    </el-button>
                    <el-button size="mini" type="danger" @click="deleteData(cmt.id)">Delete</el-button>
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
            comment: [
                'content'
            ],
            comments: [],
            users: [],
            token: '',
            success: '',
            errors: '',
            loading: false,
        }
    },

    created() {
        this.token.csrfToken;
        this.getComment();
        this.getUser();
    },

    methods: {
        // lấy dữ liệu từ api
        getComment() {
            this.loading = true;
            axios.get(`/api/comments`).then((res) => {
                if (res.status === 200) {
                    this.comments = res.data;
                    this.total = res.data.total;
                    
                }
            this.loading = false
            }).catch((err) => {})
        },
        getUser() {

            axios.get(`/api/users`).then((res) => {
                if (res.status === 200) {
                    this.users = res.data.user.data;
                }

            }).catch((err) => {})
        },
        edit(id){
            axios.get(`/api/comments/`+id).then((res) => {
                this.comment = res.data
                console.log(res.data)
            })
        },
        submit(id){
            axios.put(`/api/comments/`+id,{
                content: this.comment.content
            }).then((res) => {
                this.success = 'cập nhật thành công';
                this.getComment();
                this.comment.content = "";
            }).catch()
        },
        deleteData(id) {
            if (confirm('Bạn có chắc muốn xóa!')) {
                axios.delete(`/api/comments/` + id).then((res) => {
                    this.getComment()
                }).catch((err) => {

                })
            }
        },
        // AddCategories() {
        //     this.categorie.parent_id = this.categories.name;

        //     this.categorie.post('/api/categories', {
        //         transformRequest: [function (categorie, headers) {
        //             return objectToFormData(categorie)
        //         }],
        //         onUploadProgress: e => {
        //             // console.log(e)
        //         }
        //     }).then(response => {
        //         this.getCategories();
        //         this.success = "Thêm mới sản phẩm thành công";
        //         this.categorie.name = '';

        //     }).catch((err) => {
        //         this.errors = error.response.data.errors;
        //     });

        // },
        // updataData() {
        //     this.categorie.parent_id = this.categories.name;

        //     axios.put(`/api/categories/` + this.categorie.id, {
        //         id: this.categorie.id,
        //         name: this.categorie.name,
        //         parent_id: this.categorie.parent_id
        //     }).then((res) => {
        //         this.categorie.name = res.data.name;
        //         this.categorie.parent_id = res.data.parent_id;
        //         this.success = "Thêm mới sản phẩm thành công";
        //         this.getCategories();
        //     }).catch((err) => {

        //     })
        // },
        

    },

}
</script>

<style lang="sass" scoped>

</style>
