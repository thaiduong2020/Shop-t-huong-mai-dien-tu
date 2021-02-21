/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//admin

Vue.component('el-product', require('./components/admin/product/index.vue').default);
Vue.component('el-categories', require('./components/admin/categories/index.vue').default);
Vue.component('el-user', require('./components/admin/user.vue').default);
Vue.component('el-roles', require('./components/admin/roles/index.vue').default);
Vue.component('el-bill', require('./components/admin/bills/index.vue').default);
Vue.component('el-comment', require('./components/admin/comments/index.vue').default);

//client
Vue.component('el-product-1', require('./components/client/product-1.vue').default);
Vue.component('el-product-2', require('./components/client/product-2.vue').default);
Vue.component('el-product-3', require('./components/client/product-3.vue').default);
Vue.component('el-info-product', require('./components/client/info-products.vue').default);
Vue.component('el-category', require('./components/client/category.vue').default);
Vue.component('el-cungloai', require('./components/client/cungloai.vue').default);
Vue.component('el-search', require('./components/client/search.vue').default);
Vue.component('el-register', require('./components/client/register.vue').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
