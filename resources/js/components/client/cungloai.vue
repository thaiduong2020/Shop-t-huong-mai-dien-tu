<template>
<div>
    <div class="sag_item_policy" v-for="(data) in products" style="background: white;">
       <a  :href="'/info-products/'+data.id" style="text-decoration: none;display:flex">
         <img class="img-r" :src="'/'+data.image" alt="" width='50%'>
        <div class="span" style="padding:1.4em ;">
            <a :href="'info-products/'+data.id" >{{data.name}}</a>
            <div class="sag_no_gia">
                <span class="no_gia">{{ formatPrice(data.price) }} VNĐ</span>
            </div>
        </div>
       </a>
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            products: [],
        }
    },
    created() {
        this.getData()
    },
    methods: {
        getData() {
            axios.get(`/api/products`).then((res) => {
                this.products = res.data.data2
            }).catch()
        },
        formatPrice(value){
            let val = (value/1).toFixed().replace('.', ',')
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
        }
    }
}
</script>
