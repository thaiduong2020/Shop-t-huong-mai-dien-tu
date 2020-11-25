<template>
<div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
    <div class="sag-ttsanpham">
        <h1 class="sag-tensanpham">
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
            <div class="sag_anhsp">
                <a href="#"><img :src="'/'+products.image" alt=""></a>
            </div>
            <div class="sag_thumb_gallary">
                <div class="sag_active">
                    <div class="sag_item">
                        <a href="#"><img src="" alt=""></a>
                    </div>
                    <div class="sag_item">
                        <a href="#"><img src="" alt=""></a>
                    </div>
                    <div class="sag_item">
                        <a href="#"><img src="" alt=""></a>
                    </div>
                    <div class="sag_item">
                        <a href="#"><img src="" alt=""></a>
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
                    <span class="sag_sl">Số lượng </span>
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
                            <h3>
                                <i class="fas fa-info-circle"></i>
                                <span>Thông Tin</span>
                            </h3>
                        </li>
                        <li class="tab-link">
                            <h3>
                                <i class="fas fa-sync"></i>
                                <span>Tab tùy chỉnh</span>
                            </h3>
                        </li>
                        <li class="tab-link">
                            <h3>
                                <i class="far fa-comments"></i>
                                <span>Đánh giá</span>
                            </h3>
                        </li>
                    </ul>
                    <div class="tab-float">
                        <div class="sag-tab-content">
                            <div class="sag-rte">
                                <h5>THIẾT KẾ HIỆN ĐẠI</h5>
                                <p>Điện Thoại Honor 7X với thiết kế hiện đại và cuốn hút, được làm bằng kim loại nhôm giúp máy toát lên vẻ ngoài sang trọng. Máy khá mỏng chỉ 7.6mm nặng khoảng 165g kết hợp với 4 góc được bo tròn nhẹ nên cảm giác cầm trên tay điện thoại Honor 7X khá là thoải mái, vừa vặn trong lòng bàn tay. Cùng với mặt kính cường lực giúp tránh những va chạm không may xảy ra khi sử dụng điện thoại, máy cũng được cấp chuẩn IP67 về khả năng chống nước và bụi đảm bảo an toàn, độ bền.</p>
                                <p style="text-align:center">
                                    <img src="" alt="">
                                </p>
                                <h5>MÀN HÌNH VIỀN CỰC MỎNG</h5>
                                <p>Được trang bị màn hình kích thước 5.93 inch, độ phân giải Full HD (1080 x 2160) pixels với tỉ lệ hiển thị 18:9, trên tấm nền LTPS LCD mang lại những hình ảnh sắc nét với màu sắc trung thực. Nhờ tối ưu phần viền cực mỏng Honor 7X đưa được một không gian hiển thị rộng đáp ứng hoàn hảo nhu cầu xem phim, chơi game giải trí trên màn hình lớn.</p>
                                <h5>HIỆU NĂNG ỔN ĐỊNH</h5>
                                <p>Máy hoạt động trên nền tảng Android 8.0 với giao diện người dùng EMUI 5.1 và có sức mạnh xử lý được cung cấp bởi con chip HiSilicon Kirin 659, 8 nhân xung nhịp 2.3GHz với bộ nhớ RAM lên đến 4GB, Honor 7X thực hiện mọi tác vụ nặng nhất một cách dễ dàng, từ lướt web, giải trí, xem phim đến chơi mượt những tựa game đồ họa nặng hiện nay. Bên cạnh đó, với bộ nhớ trong 64GB chiếc điện thoại Honor giúp người dùng lưu trữ được rất nhiều dữ liệu cũng như thoải mái chụp ảnh, quay video.</p>
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
export default {
    data() {
        return {
            products: [],
            categories: [],
        }
    },
    created() {
        this.getData();
        this.getCategories();
    },
    methods: {
        getData() {
            var id = window.location.href.split('/').pop();

            axios.get(`/api/products/` + id).then((res) => {
                this.products = res.data
            }).catch((err) => {

            })
        },
        getCategories() {
            axios.get(`/api/categories`).then((res) => {
                this.categories = res.data
                console.log(res)
            }).catch((err) => {

            })
        },
        formatPrice(value) {
            return Intl.NumberFormat().format(value)
        },
    }
}
</script>

<style >

</style>
