<template>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
    <div class="modal fade" id="eexampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="    max-width: 626px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div style="margin: 0 auto;width: 26%;" v-for="(img) in images" v-if="img.id == imgid">
                    <img :src="'/'+img.name" width="100%" alt=""></div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <div class="sag-ttsanpham">
        <h1 class="sag-tensanpham" style="text-align:left">
            Điện thoại Honor 7X 64GB/4GB 3 camera
        </h1>
        <div class="sag-review">
            <div class="review_">
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
                <i class="far fa-star"></i>
            </div>
            <span class="danhgiasp">
                <a href="#">Đánh giá sản phẩm này</a>
            </span>
        </div>
        <div class="sag_ndanhsp">
            <div class="sag_anhsp" style="    padding: 1em;">
                <a href="#"><img :src="'/'+products.image" alt=""></a>
            </div>
            <div class="sag_thumb_gallary">
                <div class="sag_active">
                    <div data-toggle="modal" data-target="#eexampleModal" style="padding: 0.3em;" class="sag_item" v-for="(image) in images" v-if="image.id_product == products.id" @click="checkimg(image.id)">
                        <a href="#"><img :src="'/'+image.name" alt=""></a>
                    </div>
                </div>

            </div>
        </div>
        <div class=" sag_nd__ col-xs-12 col-sm-6 col-md-6 col-lg-6 ">
            <div class="sag_ndtensp">
                <div class="sag_thsp">
                    <span class="th_tr">
                        <span class="sag_name">Thương hiệu</span> 
                        <span v-for="(cate) in categories" class="sag_status" v-if="cate.id == products.id_brand">{{cate.name}}</span>
                    </span>
                    <br>
                    <span class="th_tr">
                        <span class="sag_name">Tình trạng</span>
                        <span class="sag_status" v-if="products.quantity > 0" style="color:green">Còn hàng</span>
                    </span>
                </div>
                <div class="sag_price_box">
                    <span class="sag_price">{{ formatPrice(products.price) }} VNĐ</span>
                </div>
                <div class="sag_product_summary">
                    <div class="sag.rte text3line">
                        Thiết kế hiện đại Điện Thoại Honor 7X với thiết kế hiện đại và cuốn hút, được làm bằng kim loại nhôm giúp máy toát lên vẻ ngoài sang trọng. Máy khá mỏng chỉ 7.6mm nặng khoảng 165g kết hợp với 4 góc được bo tròn nhẹ nên...
                    </div>
                </div>
                <div class="sag_form_product col-sm-12">
                    <span class="sag_sl">Số lượng {{ user.name }}</span>
                    <div class="sag_tanggiam">
                        <div class="buttons_added">
                            <input class="minus is-form" type="button" value="-">
                            <input aria-label="quantity" class="input-qty" max="10" min="1" name="" type="number" value="">
                            <input class="plus is-form" type="button" value="+">
                        </div>
                        <button type="submit" class="sag_btn_ button_cart_buy_enable">
                            <a :href="'/add-cart/'+products.id">
                                Mua ngay
                            </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sag_tab_width_full">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-lg-12 col-md-12">
                <div class="sag_product_tabs">
                    <ul class="sag_tabs">
                        <li class="tab-link current">
                            <h3 @click="checkMota()">
                                <i class="fas fa-info-circle"></i>
                                <span>Thông Tin</span>
                            </h3>
                        </li>
                        <li class="tab-link">
                            <h3 @click="checkTuychinh()">
                                <i class="fas fa-sync"></i>
                                <span>Tab tùy chỉnh</span>
                            </h3>
                        </li>
                        <li class="tab-link">
                            <h3 @click="checkDanhgia()">
                                <i class="far fa-comments"></i>
                                <span>Đánh giá</span>
                            </h3>
                        </li>
                    </ul>
                    <div class="tab-float" v-if="mota">
                        <div class="sag-tab-content">
                            <div class="sag-rte">
                                <p>
                                    {{ products.description }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-float" v-if="tuychinh">
                        <div class="sag-tab-content">
                            <div class="sag-rte">
                                <p>
                                    tuy chinh
                                </p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="tab-float" v-if="danhgia">
                        <div class="sag-tab-content">
                            <div class="sag-rte">
                                <div class="form-group">
                                    <label for="comment">Comment: </label>
                                    <textarea v-model="comment.content" class="form-control" rows="5" id="comment"></textarea>
                                    <button type="submit" class="btn btn-primary" @click.prevent="addCommnent()">gửi</button>
                                </div>
                               <div v-loading="loading">
                                 <div  v-for="(cmt) in comments" v-if="cmt.id_product == products.id">
                                    <div style="display: flex;">
                                        <i style="    font-size: 37px;" class="far fa-user-circle"></i>
                                        <span v-for="(user) in users" v-if="user.id == cmt.id_user" style="margin-left: 0.7em;">{{user.name}}<br>
                                            Nhận xét vào ngày {{cmt.created_at}}</span>
                                    </div>
                                    <div style="margin-top: 1em;">
                                        <b style="    font-weight: revert;font-size: 16px;line-height: 24px;">{{cmt.content}}</b>
                                    </div>
                                    <hr>
                                </div>
                               </div>
                            </div>
                        </div>
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
    props : ['user'],
    data() {
        return {
            
            products: [],
            categories: [],
            images: [],
            imgid: [],
            mota: true,
            tuychinh: false,
            danhgia: false,
            comment: new Form({ 
                id_product: "",
                id_user: "",
                content: ""
            }),
            comments:[],
            user: '',
            users:[],
            loading: false,
        }
    },
    created() {
        this.getData();
        this.getCategories();
        this.getDataImg();
        this.getComment();
        this.getUsers();

    },
    methods: {
        getData() {
            var id = window.location.href.split('/').pop();

            axios.get(`/api/products/` + id).then((res) => {
                this.products = res.data
            }).catch((err) => {

            })
        },
        getDataImg() {

            axios.get(`/api/images`).then((res) => {
                this.images = res.data
            }).catch((err) => {

            })
        },
         getUsers() {

            axios.get(`/api/users`).then((res) => {
                this.users = res.data.user.data
            }).catch((err) => {

            })
        },
        getCategories() {
            axios.get(`/api/categories`).then((res) => {
                this.categories = res.data
            }).catch((err) => {

            })
        },
        getComment(){
            this.loading = true;
            axios.get(`/api/comments`).then((res)=>{
                this.comments = res.data
                this.loading = false;
            }).catch()
        },
        addCommnent(){
            var user = JSON.parse(this.user)
            // alert(this.comment.content);
            this.comment.id_product = this.products.id;
            this.comment.id_user =user;
            this.comment.post('/api/comments',
                {
                    id_product: this.comment.id_product,
                    id_user: this.comment.id_user,
                    comtent: this.comment.comtent
                }
            ).then((res)=>{
                this.getComment();
                console.log(123)
            }).catch()
        },
        formatPrice(value) {
            return Intl.NumberFormat().format(value)
        },
        checkimg(id) {
            this.imgid = id;
        },
        checkMota() {
            this.mota = true;
            this.tuychinh = false;
            this.danhgia = false
        },
        checkTuychinh() {
            this.mota = false;
            this.tuychinh = true;
            this.danhgia = false
        },
        checkDanhgia() {
            this.mota = false;
            this.tuychinh = false;
            this.danhgia = true
        }
    }
}
</script>

<style >

</style>
