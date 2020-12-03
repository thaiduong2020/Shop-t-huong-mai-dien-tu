<template>
<div style="    display: flex;">

    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
        <div v-for="(lap) in laptop" class="sag-pro-item">
            <div class="ss">
                <div class="sag_hinhanh">
                    <a :href="'info-products/'+lap.id">
                        <div class="hover13 column">
                            <div>
                                <figure><img class="img-lp1" :src="'/'+lap.image" alt=""></figure>
                            </div>

                        </div>
                    </a>
                </div>
                <div class="sag_noidung">
                    <h3 class="noidung-name">
                        <a class="tivi" :href="'info-products/'+lap.id">{{lap.name}}</a>
                    </h3>
                    <div class="noidung-giagoc">
                        <span class="gia-goc"> {{lap.price}}đ </span>
                    </div>
                    <div class="noidung-giakm">
                    </div>
                </div>
            </div>
        </div>

        <a href="#"><img src="upload/baner1.png" alt="" style="width: 100%;"></a>
    </div>
    <div class=" col-lg-9 col-md-9 col-sm-12 col-xs-12 col-lg-push-3 col-md-push-3">
        <div class="d-flex" style="flex-wrap: wrap;">

            <el-col v-loading="loading" style="display: flex;flex-wrap: wrap;">
                <el-card v-for="(item) in products" style="width: 12.4rem;margin-left: 7.8px;box-shadow: none; border: solid 1px #ebebeb;" class="border-card">
                    <a :href="'info-products/'+item.id">
                        <div class="hover01 column">
                            <div>
                                <figure><img class="img-product-1" :src="item.image"></figure>
                            </div>
                        </div>
                    </a>
                    <div class="span" style="padding:1.4em">
                        <a :href="'info-products/'+item.id">{{item.name}}</a>
                        <div class="sag_no_gia">
                            <span class="no_gia">{{ formatPrice(item.price) }} VNĐ</span>
                        </div>
                        <div class="bottom clearfix">
                        <div class="wrapper">
                            
                            <a :href="'/add-cart/'+item.id"><i style="margin-right: 0.1em;" class="fas fa-shopping-bag"></i><span>Mua ngay</span></a>
                        </div>
                            
                            
                        </div>
                    </div>
                </el-card>

            </el-col>
           
        </div>
<el-pagination class="paginate" background layout="prev, pager, next" :total="total" :current-page="currentPage" :page-size="4" @current-change="changePage">

            </el-pagination>
    </div>
 
</div>
</template>

<script>
import Element from 'element-ui'
import Pagination from 'el-pagination/Pagination'
export default {
    data() {
        return {
            laptop: [],
            products: [],
            categories: [],
            images: [],
            currentPage: 1,
            total: 0,
            loading: false,
        }
    },

    created() {
        this.getData();
        this.getCategories();
    },

    methods: {
        // lấy dữ liệu từ api
        getData() {
            this.loading = true;
            axios.get(`/api/products?limit=${this.pageSize}&page=${this.currentPage}`).then((res) => {
                if (res.status === 200) {
                    this.products = res.data.data1.data;
                    this.laptop = res.data.data4.data;
                    this.images = res.data.data.image;
                    this.total = res.data.data1.total;

                }
                this.loading = false;
            }).catch((err) => {})
        },
        getCategories() {
            axios.get(`/api/categories`).then((res) => {
                if (res.status === 200) {
                    this.categories = res.data;
                }
            }).catch((err) => {})
        },
        formatPrice(value) {
            return Intl.NumberFormat().format(value)
        },
        changePage(page) {
            this.currentPage = page;
            this.getData();
        },

    }
}
</script>

<style>
.time {
    font-size: 13px;
    color: #999;
}

.bottom {
    margin-top: 13px;
    line-height: 12px;
}

.button {
    padding: 0;
    float: right;
}

.image {
    width: 100%;
    display: block;
}

.clearfix:before,
.clearfix:after {
    display: table;
    content: "";
}

.clearfix:after {
    clear: both
}

.border-card {
    border: solid 1px #ebebeb;
    height: 23em;

}

.flex-card {
    display: flex;

}

.span {
    font-family: "Roboto", sans-serif;
    font-size: 14px;
    font-weight: 400;
    margin: 0 0 5px;
    line-height: 24px;
    text-overflow: ellipsis;
    overflow: hidden;
    white-space: nowrap;
}

.span a {
    color: #555;
    text-decoration: none;
}

.paginate {
    float: right;
    margin-top: 1em;
}

@import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');

.image-flip:hover .backside,
.image-flip.hover .backside {
    -webkit-transform: rotateY(0deg);
    -moz-transform: rotateY(0deg);
    -o-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    transform: rotateY(0deg);
    border-radius: .25rem;
}

.image-flip:hover .frontside,
.image-flip.hover .frontside {
    -webkit-transform: rotateY(180deg);
    -moz-transform: rotateY(180deg);
    -o-transform: rotateY(180deg);
    transform: rotateY(180deg);
}

.mainflip {
    -webkit-transition: 1s;
    -webkit-transform-style: preserve-3d;
    -ms-transition: 1s;
    -moz-transition: 1s;
    -moz-transform: perspective(1000px);
    -moz-transform-style: preserve-3d;
    -ms-transform-style: preserve-3d;
    transition: 1s;
    transform-style: preserve-3d;
    position: relative;
}

.frontside {
    position: relative;
    -webkit-transform: rotateY(0deg);
    -ms-transform: rotateY(0deg);
    z-index: 2;
}

.backside {
    position: absolute;
    top: 0;
    left: 0;
    background: white;
    -webkit-transform: rotateY(-180deg);
    -moz-transform: rotateY(-180deg);
    -o-transform: rotateY(-180deg);
    -ms-transform: rotateY(-180deg);
    transform: rotateY(-180deg);
    -webkit-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    -moz-box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
    box-shadow: 5px 7px 9px -4px rgb(158, 158, 158);
}

.frontside,
.backside {
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    -ms-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transition: 1s;
    -webkit-transform-style: preserve-3d;
    -moz-transition: 1s;
    -moz-transform-style: preserve-3d;
    -o-transition: 1s;
    -o-transform-style: preserve-3d;
    -ms-transition: 1s;
    -ms-transform-style: preserve-3d;
    transition: 1s;
    transform-style: preserve-3d;
}

.frontside .card,
.backside .card {
    min-height: 312px;
}

.backside .card a {
    font-size: 18px;
    text-decoration: none;
}

.frontside .card .card-title,
.backside .card .card-title {
    color: #007b5e !important;
}

.frontside .card .card-body img {
    width: 120px;
    height: 120px;
    border-radius: 50%;
}

.add a {
    color: #606366;
    padding: 10px 20px;
    border: 1px solid #57a7c6;
    display: inline-block;
    line-height: 100%;
}

.add a:hover {
    color: #fff !important;
    background: #3a5c83;
}

.el-card__body {
    padding: 15px 0px !important;
}
</style>
