<template>
<div>
    <!-- Modal -->
 <div class="content-header" style="    background: white; margin-bottom: 0.5em;">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h4 style="float: left;" class="m-0">Quản lý đơn hàng</h4>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Quản lý đơn hàng</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    
                </div>
            </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width:904px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới danh mục</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div v-for="(or) in order" v-if="or.id == detail2.id_order">
                    <div v-for="(cus) in customer" v-if="cus.id == or.id_customer">
                        <p><b>Tên khách hàng : </b>{{cus.name}}</p>
                        <p><b>Địa chỉ : </b>{{cus.address}}</p>
                        <p><b>Email : </b>{{cus.email}}</p>
                        <p><b>Số điện thoại : </b>{{cus.phone}}</p>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">tên sản phẩm</th>
                                    <th scope="col">Phương thức thanh toán</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tổng tiền</th>
                                     <th scope="col">Ngày đặt hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item) in product" v-if="item.id == detail2.id_product">
                                    <th scope="row">1</th>
                                    <td>{{ item.name}}</td>
                                    <td>{{ or.payment}}</td>
                                    <td>{{detail2.quantity}}</td>
                                    <td>{{detail2.price}}</td>
                                    <td>{{detail2.created_at}}</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="giaohang(detail2.id)" >Giao hàng</button>
                </div>
            </div>
        </div>
    </div>

    <table v-loading="loading" class="table table-bordered table-striped">

        <thead class="thead-light">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Mã sản phẩm</th>
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col"></th>
                <th scope="col"></th>

            </tr>
        </thead>
        <tbody v-for="(det) in detail">
            <tr v-for="(or) in order" v-if="or.id == det.id_order">
                <th style="width: 0.1%;" scope="row">{{det.id}}</th>
                <td style="width: 13%;">{{det.id_product}}</td>
                <td v-for="(cus) in customer" v-if="cus.id == or.id_customer" style="width: 21%;">{{cus.name}}</td>
                <td v-for="(cus) in customer" v-if="cus.id == or.id_customer" style="width: 15%;">{{cus.address}}</td>
                <td v-for="(cus) in customer" v-if="cus.id == or.id_customer" style="width: 15%;">{{cus.phone}}</td>
                <td style="width: 15%;" v-if="det.status == 0 "><a style="cursor: pointer;background: #535454; padding: 0.2em;color: white;border-radius: 3px;" title="Chờ xử lý">Chờ xử lý...</a></td>
                <td style="width: 15%;" v-if="det.status == 1 "><a style="cursor: pointer;background: #28a745; padding: 0.2em;color: white;border-radius: 3px;" title="Chờ xử lý">Đang giao hàng...</a></td>
                <td style="width: 37%;">
                    <el-button size="mini" type="danger" @click="chitiet(det.id)" data-toggle="modal" data-target="#exampleModal">Chi tiết</el-button>
                    <el-button size="mini" type="danger" @click="deleteBill(det.id)">Xóa</el-button>
                </td>
            </tr>
        </tbody>

    </table>

</div>
</template>

<script>
import Vue from 'vue'
import Element from 'element-ui'
Vue.use(Element)

export default {
    data() {
        return {
            detail: [],
            order: [],
            customer: [],
            detail2: [],
            order2: [],
            customer2: [],
            product: [],
            status:1,
            loading: false,
        }
    },

    created() {
        this.getData();
    },

    methods: {
        // lấy dữ liệu từ api
        getData() {
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
        chitiet(id) {
            axios.get(`/api/bills/` + id).then((res) => {
                if (res.status === 200) {
                    this.detail2 = res.data.order_detail;
                    this.order2 = res.data.order;
                    this.customer2 = res.data.customer;
                    this.product   =  res.data.Product;
                    console.log(res.data.Product)
                }
                this.loading = false;
            }).catch((err) => {})

        },
        giaohang(id){
            axios.put(`/api/bills/`+id,{
                status: this.status
            }).then((res) =>{
                this.getData();
            }).catch()
        },
        deleteBill(id) {
            if (confirm('Bạn có chắc muốn xóa!')) {
                axios.delete(`/api/bills/` + id).then((res) => {
                    this.getData()
                }).catch((err) => {

                })
            }
        },
    },

}
</script>

<style lang="sass" scoped>

</style>
