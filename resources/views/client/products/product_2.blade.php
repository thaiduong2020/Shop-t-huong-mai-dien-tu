
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/fontawesome-free-5.15.1-web/css/all.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div id="app" >
        <button  style="background: #1893e6;" data-toggle="modal" data-target="#exampleModal">
            Đăng Ký
        </button>
        <div>
            <div  class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="float:right">
                        <button type="button" class="btn btn-primary" @click="checkCC()"  >
                            Đăng nhập
                        </button>
                        <button type="button" class="btn btn-primary" @click="checkCC2()"  >
                            Đăng ký
                        </button>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
        
                    <div v-if="login" class="modal-body">
                            <h5 class="modal-title" id="exampleModalLabel">Đăng nhập</h5>
                          
                        <div class="modal-body">
                            <form method="POST" >
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email"   class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mật khẩu</label>
                                    <input type="password"  class="form-control">
                                </div>
                           
        
                            </form>
                        </div>
                                <div  v-if="login">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" @click.prevent="Login()" class="btn btn-primary">Đăng nhập</button>
                    </div>
                    </div>
                 
        
                        <div v-if="regis" class="modal-body">
                            <h5 class="modal-title" id="exampleModalLabel">Đăng ký</h5>
                          
                        <div class="modal-body">
                          
                            <form method="POST">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Họ và tên</label>
                                    <input type="name" lass="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mật khẩu</label>
                                    <input type="password"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số điện thoại</label>
                                    <input type="phone" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Địa chỉ</label>
                                    <input type="address"  class="form-control">
                                </div>
        
                            </form>
                        </div>
                    </div>
                    <div class="modal-footer" v-if="regis">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                        <button type="button" @click.prevent="addUser()" class="btn btn-primary">Đăng nhập</button>
                    </div>
        
                </div>
            </div>
        </div>
        
        
        
        </div>
    </div>
    <script>
        var app = new Vue({
        el: '#app',
        data: {
            message: 'Hello Vue!',
            regis: false,
            login: true,
        },
        methods: {
            checkCC(){
             this.login = true;
             this.regis =  false;
            },
            checkCC2(){
                this.login = false;
                this.regis =  true;

            }
        },
        })
    </script>
</body>
</html>