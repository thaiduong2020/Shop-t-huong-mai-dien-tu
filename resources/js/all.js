var app = new Vue({
    el: '#app',
    data: {
        message: 'Hello Vue!',
        regis: false,
        login: true,
    },
    methods: {
        checkCC() {
            this.login = true;
            this.regis = false;
        },
        checkCC2() {
            this.login = false;
            this.regis = true;

        }
    },
})