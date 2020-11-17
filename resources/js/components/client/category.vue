<template>
<ul class="sub-menu">
    <li v-for="(cate) in categories" v-if="cate.parent_id == 0">
        <a href=" #">{{cate.name}}</a>
        <ul style="    left: 307px;" class="sub-menu2">
            <li v-for="(cate2) in categories" v-if="cate2.parent_id == cate.id"> <a href="#">{{cate2.name}}</a>
                <ul class="sub-menu2">
                    <li v-for="(cate3) in categories" v-if="cate3.parent_id == cate2.id"> <a href="#">{{cate3.name}}</a>
                    </li>

                </ul>
            </li>

        </ul>
    </li>

</ul>
</template>

<script>
export default {
    data() {
        return {
            categories: [],
        }
    },
    created() {
        this.getData();
    },
    methods: {
        getData() {
            axios.get(`/api/categories`).then((res) => {
                this.categories = res.data.data;
                console.log(res.data.data)
            }).catch()
        }
    }

}
</script>

<style >

</style>
