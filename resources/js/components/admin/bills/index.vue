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
                                <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                                <li class="breadcrumb-item active">Quản lý đơn hàng</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>

                </div>
            </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width:1019px">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm mới danh mục</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div >
                    <div  style="padding: 1em;">
                        <p v-for="(cuss) in customer" v-if="cuss.id == order2.id_customer"><b>Tên khách hàng : </b>{{cuss.name}}</p>
                        <p v-for="(cuss) in customer" v-if="cuss.id == order2.id_customer"><b>Địa chỉ : </b>{{cuss.address}}</p>
                        <p v-for="(cuss) in customer" v-if="cuss.id == order2.id_customer"><b>Email : </b>{{cuss.email}}</p>
                        <p v-for="(cuss) in customer" v-if="cuss.id == order2.id_customer"><b>Số điện thoại : </b>{{cuss.phone}}</p>

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
                            <tbody v-for="(dee) in order_detail" v-if="dee.id_order == order2.id">
                                <tr v-for="(item) in product" v-if="item.id == dee.id_product">
                                    <th scope="row">{{dee.id}}</th>
                                    <td>{{ item.name}}</td>
                                    <td>{{ order2.payment}}</td>
                                    <td>{{dee.quantity}}</td>
                                    <td>{{formatPrice(dee.price)}}</td>
                                    <td>{{dee.created_at}}</td>

                                </tr>


                            </tbody>

                        </table>
<div> Tổng tiền: <span style="color:#f90">{{formatPrice(order2.total)}} VNĐ</span>  </div>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" @click="giaohang(order2.id)" >Giao hàng</button>
                </div>
            </div>
        </div>
    </div>

    <table v-loading="loading" class="table table-bordered table-striped">

        <thead class="thead-light">
            <tr>
                <th scope="col">id</th>
                <!-- <th scope="col">Mã sản phẩm</th> -->
                <th scope="col">Tên khách hàng</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col"></th>
                <th scope="col"></th>

            </tr>
        </thead>
        <tbody >
            <tr v-for="(or) in order" >
                <th style="width: 0.1%;" scope="row">{{or.id}}</th>
                <!-- <td style="width: 13%;" v-for="(det) in detail">{{det.id_product}}</td> -->
                <td v-for="(cus) in customer" v-if="cus.id == or.id_customer" style="width: 21%;">{{cus.name}}</td>
                <td v-for="(cus) in customer" v-if="cus.id == or.id_customer" style="width: 15%;">{{cus.address}}</td>
                <td v-for="(cus) in customer" v-if="cus.id == or.id_customer" style="width: 15%;">{{cus.phone}}</td>
                <td style="width: 15%;"  v-if="or.status == 0 "><a style="cursor: pointer;background: #535454; padding: 0.2em;color: white;border-radius: 3px;" title="Chờ xử lý">Chờ xử lý...</a></td>
                <td style="width: 15%;"  v-if="or.status == 1 "><a style="cursor: pointer;background: #28a745; padding: 0.2em;color: white;border-radius: 3px;" title="Chờ xử lý">Đang giao hàng...</a></td>
                <td style="width: 37%;">
                    <el-button size="mini" type="danger"   @click="chitiet(or.id)" data-toggle="modal" data-target="#exampleModal">Chi tiết</el-button>
                    <el-button size="mini" type="danger"   @click="deleteBill(or.id)">Xóa</el-button>
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
            order_detail: [],
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
                    this.order_detail = res.data.order_detail;
                    this.order2 = res.data.order;
                    this.customer2 = res.data.customer;
                    this.product   =  res.data.product;
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
         formatPrice(value) {
            return Intl.NumberFormat().format(value);
        },
    },

}
</script>

<style lang="sass" scoped>

</style>
