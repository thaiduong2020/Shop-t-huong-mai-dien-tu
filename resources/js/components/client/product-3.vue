<template>
<el-col>
    <div class="flex-card" style="flex-wrap: wrap;">
        <el-card style="width: 11.97rem;" v-for="item in products" class="border-card" :body-style="{ padding: '0px'  }">
            <img style="height: 199.97px;" :src="item.image" class="image">
            <div class="span" style="padding: 14px;">
                <a href="#">{{item.name}}</a>
                <div class="sag_no_gia">
                    <span class="no_gia">{{ formatPrice(item.price) }} VNĐ</span>
                </div>
                <time class="time">{{item.created_at}}</time>
                <div class="bottom clearfix">
                    <el-button type="text" class="btn btn-primary">đặt hàng</el-button>
                </div>
            </div>
        </el-card>

    </div>
    <el-pagination class="paginate" background layout="prev, pager, next" :total="total" :current-page="currentPage" :page-size="5" @current-change="changePage">

    </el-pagination>
</el-col>
</template>

<script>
import Element from 'element-ui'
import Pagination from 'el-pagination/Pagination'
export default {
    data() {
        return {
            products: [],
            currentPage: 1,
            total: 0,
        }
    },

    created() {
        this.getData();
    },

    methods: {
        // lấy dữ liệu từ api
        getData() {
            axios.get(`/api/products?limit=${this.pageSize}&page=${this.currentPage}`).then((res) => {
                if (res.status === 200) {
                    this.products = res.data.data;
                    this.total = res.data.total
                }
            }).catch((err) => {})
        },
        formatPrice(value) {
            return Intl.NumberFormat().format(value)
        },
        changePage(page) {
            this.currentPage = page;
            this.getData();
            console.log(page);
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
    margin-left: 0.5em;
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

.span a:hover {
    color: #167edf;
    text-decoration: none;
}

.paginate {
    float: right;
    margin: 1em;
}
</style>
