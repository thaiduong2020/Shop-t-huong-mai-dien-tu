<template>
<div>
    <!-- Modal -->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width:904px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới danh mục</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="button" @click.prevent="AddRoles()" class="btn btn-primary">Thêm mới</button>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" @click.prevent="updateRole()" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <table v-loading="loading" class="table table-bordered table-striped">

        <thead class="thead-light">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Vai trò</th>
                <th scope="col"></th>

            </tr>
        </thead>
        <tbody>

            <tr v-for="(det) in detail">
                <div v-for="(or) in order" v-if="or.id == det.id_order">
                    <div v-for="(cus) in customer" v-if="cus.id == or.id_customer">
                        <th style="width: 0.1%;" scope="row">{{det.id}}</th>
                        <td style="width: 21%;"  >{{cus.name}}</td>
                        <td style="width: 21%;"  >{{cus.address}}</td>
                        <td style="width: 21%;"  >{{cus.phone}}</td>
                        <td style="width: 21%;" v-if="det.status == 0 " ><a  style="cursor: pointer;background: #535454; padding: 0.2em;color: white;" title="Chờ xử lý">Chờ xử lý</a></td>


                        <td style="width: 37%;">
                            <el-button size="mini" type="danger" @click="deleteRole(role.id)">Delete</el-button>
                        </td>
                    </div>

                </div>
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

            detail: [],
            order: [],
            customer: [],
            // dmc: false,
            // dmcc: false,
            // dmccc: false,
            // dmcccc: false,
            // token: '',
            // success: '',
            // errors: '',
            loading: false,
        }
    },

    created() {
        this.getRoles();
    },

    methods: {
        // lấy dữ liệu từ api
        getRoles() {
            this.loading = true;
            axios.get(`/api/bills`).then((res) => {
                if (res.status === 200) {
                    this.detail = res.data.order_detail;
                    this.order = res.data.order;
                    this.customer = res.data.customer;
                }
                this.loading = false;
            }).catch((err) => {})
        },

        // updateRole() {

        //     axios.put(`/api/roles/` + this.role.id, {
        //         id: this.role.id,
        //         name: this.role.name,   
        //         display_name: this.role.display_name
        //     }).then((res) => {
        //         this.role.name = res.data.name;
        //         this.role.display_name = res.data.display_name;
        //         this.success = "Thêm mới sản phẩm thành công";
        //         this.getRoles();
        //     }).catch((err) => {

        //     })
        // },
        // deleteRole(id) {
        //     if (confirm('Bạn có chắc muốn xóa!')) {
        //         axios.delete(`/api/roles/` + id).then((res) => {
        //             this.getRoles()
        //         }).catch((err) => {

        //         })
        //     }
        // },
    },

}
</script>

<style lang="sass" scoped>

</style>
