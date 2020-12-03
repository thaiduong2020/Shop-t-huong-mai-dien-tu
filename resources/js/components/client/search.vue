<template>
<div class="sag_header_search">
    <form class="input-group search-bar" action="/search" method="get" role="search">

        <div class="input-group ">
            <input v-model="search_input" class="form-control" type="text" placeholder="Tìm kiếm" aria-label="Search">

        </div>

    </form>
    <div id="result" :style="resultDiv">
             <div style="border-bottom: 1px solid #e1e1e1;padding: 0.5em;" class="media" v-for="search_result in search_result" :key="search_result.id">

    <a :href="'/info-products/'+search_result.id" style="width: 100%;text-decoration: none;">
                <a class="pull-left" href="#"><img :src="'/'+search_result.image" alt=""></a>
                <div class="media-body">
                    <span style="    color: black" class="cart-item-title">{{search_result.name}}</span><br>
                    <span style="    color: black" class="cart-item-amount">Giá: <span>{{search_result.price}} VND</span></span>
                </div>
    </a>
            </div>
           
           
    </div>
</div>
</template>

<script>
export default {
    data() {
        return {
            search_input: '',
            search_result: '',
            resultDiv: {
                display: "block"
            }
        }
    },
    methods: {
        getdata(val) {
            axios.get(`/search/` + val).then((res) => {
                this.search_result = res.data;
                console.log(res.data)
            });
        },

    },
    watch: {
        search_input: function (val) {
            this.getdata(val)
        if(this.search_input.length){
            this.resultDiv.display="block"
        }else{
            this.resultDiv.display="none"
        }
        }
    }
}
</script>

<style>
#result {
   position: absolute;
    z-index: 1000;
    top: 4.7em;
    width: 89%;
    background: white;
    left: 26.9px;
    color: white;
    border: 0px solid #ced4da;
    border-radius: 0.25rem;
}
</style>
