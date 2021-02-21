<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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


    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        function favourite(stt,id){
            var  u = '/favourite';
            var x = document.querySelectorAll("#product-favourite");
            if(x[stt].classList.contains('actived')){
                u+='R';
            }
            else  u+='A';
            x[stt].classList.toggle('actived');
            $.ajax({
             type: "GET",
             url: u,
             data: "id=" + id
            });
        }
    </script>
    <script>
        function removeFavourite(stt,id){
            if (confirm('Bạn có chắc muốn xóa sản phẩm yêu thích ?')) {
              favourite(stt,id);
              $.ajax({
                    type: "GET",
                    url: '/loadfavourite',
                    data: "id=" + id,
                    success: function(data){
                        $('#row-favourite').html(data);
                    }
                });
            }
        }
    </script>
    <title>@yield('title')</title>
   @yield('head')
   <script src="{{ asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{ asset('js/adminlte.js') }}"></script>
    <script src="{{ asset('js/js.js') }}"></script>
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <style>
        @import url(https://fonts.googleapis.com/css?family=Lato:300,400,700);
        a.animated-button.victoria-four {
            border: 1px solid #ffffff;
            width: 10em;
            font-family: 'Lato', sans-serif;
            color: #ffffff;
        }
        .clock{
            border: 1px solid white;
    border-radius: 50%;
    width: 17%;
    height: 20px;
    background: white;
    text-align: center;
    }
    .num{
        line-height: 1.5em;
        font-size: 13px;
        color:#E44E22
    }
    .count{
        position: absolute;
        width: 100%;
        top: 4.5em;
        padding-left: 0.6em;


    }
    .countdown{
        position: fixed;
width: 127px;
height: 200px;
right: 10px;
top: 203px;
transform-origin: top center;
/* animation: pendulum 3s infinite linear; */
    }
    @-webkit-keyframes swinging{
    0%{-webkit-transform: rotate(10deg);}
    50%{-webkit-transform: rotate(-5deg)}
    100%{-webkit-transform: rotate(10deg);}
}

@keyframes swinging{
    0%{transform: rotate(10deg);}
    50%{transform: rotate(-5deg)}
    100%{transform: rotate(10deg);}
}

.countdown{
    -webkit-transform-origin: 50% 0;
    transform-origin: 50% 0;
    -webkit-animation: swinging 3.5s ease-in-out forwards infinite;
    animation: swinging 3.5s ease-in-out forwards infinite;
}
    </style>
</head>

<body>
    <div id="app">

        <div class="main">
            <div class="sgtopbar hidden-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-5 col-sm-6 hidden-xs">
                            <div class="sgtop hidden-xs">
                                Bạn cần hổ trợ :
                                <a href="tel:0355382715">0355382715</a>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                            <div class="sg f-right">
                                <a href="#">Hệ Thống Cửa hàng</a>
                            </div>
                            <div class="sag">
                                <a href="#">Theo dõi đơn hàng</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- end topbar  -->
            <div class="sag_header_top">
                <div class="sag_topbar">
                    <div class="container">
                        <div class=" row">
                            <div class="sag_head col-lg-12 col-md-12 col-sm-12">
                                <div class="row">
                                    <div class="sag_logo col-lg-3 col-md-3">
                                        <a href="{{ route('home')}}" class="logo_wrapper" style="width: 100%;">
                                            <img src="/storage/image/logo.png" alt="logo">
                                        </a>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 col-search-engine">
                                        <el-search></el-search>

                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-2 hidden-sm hidden-xs">
                                        <div class="phone_main_menu" style="padding: 0em 32px;line-height: 7.3em;">
                                            <div class="downdown_cart hidden-sm hidden-xs">
                                                <div class="cart_ico inline-block ico_width">
                                                    <div class="mini-cart">
                                                        <div class="row">
                                                            <div class="col-md-3 col-sm-3 col-xs-6">
                                                                <a href="#" class="btn btn-sm animated-button victoria-four" id="anhien" style="font-family: Roboto, sans-serif;"> <i style="font-size: 26px;cursor:pointer" id="click_cart_an" style="font-size: 23px" class="fa fa-shopping-bag text-light"></i>
                                                                    Giỏ hàng ( @if (Session::has('Cart')) {{Session('Cart')->totalQty}}
                                                                    @else 0 @endif )
                                                                </a>
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
                    </div>
                </div>
            </div>
            @if (Session::has('Cart'))
            <div class="beta-dropdown cart-body" id="cart">
                @foreach ($product_cart as $product)
                <div class="cart-item">
                    <a class="cart-item-delete" href="{{ route('delete-cart',['id'=> $product['item']['id']])}}"><i
                                                                class="fa fa-times"></i></a>
                    <div class="media">
                        <a class="pull-left" href="#"><img src="/{{$product['item']['image']}}" alt=""></a>
                    <div class="media-body" style="    margin-left: 0.5em;">
                            <span class="cart-item-title">{{$product['item']['name']}}</span>

                            <span class="cart-item-amount">Đơn giá: <span>{{number_format($product['qty']*$product['item']['price'])}} VND</span></span>
                        </div>
                    </div>
                </div>
                @endforeach



                <div class="cart-caption">
                    <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value">{{number_format(Session('Cart')->totalPrice)}} VND</span></div>
                    <div class="clearfix"></div>

                    <div class="center add">
                        <div class="space10 ">&nbsp;</div>
                        <a href="{{ route('getCheckout')}}" class="beta-btn primary text-center">Thanh toán <i style="font-size: 10px;padding-left: 5px;color: #f90;" class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            @endif

            <!-- end header -->
            <!-- menu -->
            <div class="sag_warp_main" style="    height: 51px;">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="sag__warp_hed">
                                    <div class="sag_megabar col-mega hidden-sm hidden-xs">
                                        <div class="sag_menudung">
                                            <div class="sag_title">
                                                <span class="title">DANH MỤC SẢN PHẨM</span>
                                                <i class="fas fa-bars"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sag_menu_ngan">
                                    <nav class="menu_ngan">
                                        <ul class="sag_fix">
                                            <li><a href="{{ route('home') }}">Trang Chủ</a></li>
                                            <li>
                                                <a href="{{route('allproduct')}}">Sản Phẩm</a>
                                                <ul class="sub-menu" style="z-index: 1000 !important;">
                                                    @foreach ($dataCategories as $item)
                                                        @if ($item->parent_id == 0)
                                                        <li>
                                                            <a href="{{ route('products',['id' => $item->id]) }}">{{ $item->name }}</a>
                                                            <ul class="sub-menu2" style="margin-left: 0.7rem;">
                                                                @foreach ($dataCategories as $item2)
                                                                    @if ($item2->parent_id == $item->id)
                                                                        <li><a href="{{ route('products',['id' => $item2->id]) }}">{{ $item2->name }}</a></li>
                                                                    @endif
                                                                @endforeach
                                                            </ul>
                                                        </li>

                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li><a href="{{ route('listFavourite') }}">sản phẩm yêu thích</a></li>
                                            <li><a href="{{ route('khuyenmai') }}">Khuyến Mãi Hot</a></li>
                                            <li><a href="{{ route('tragop') }}">Mua Trả Góp</a></li>

                                            <li><a href="{{ route('lienhe') }}">Liên Hệ</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="countdown">
                                    <a target="_blank" href="{{route('count')}}"><img src="/storage/image/new.png" alt=""></a>
                                    <div class="count" style="display: flex">

                                                <div class="clock">
                                                    <div id="days" class="num">&nbsp;</div>

                                                    {{-- <div id="days-text" class="text">Ngày</div> --}}
                                                </div>
                                                <div style="line-height: 1em; padding: 1px 1px; color:white">:</div>
                                                    <div class="clock">
                                                        <div id="hours" class="num">&nbsp;</div>
                                                        {{-- <div id="hours-text" class="text">Giờ</div> --}}
                                                    </div>
                                                    <div style="line-height: 1em; padding: 1px 1px;color:white">:</div>
                                                    <div class="clock">
                                                        <div id="mins" class="num">&nbsp;</div>
                                                        {{-- <div id="mins-text" class="text">Phút</div> --}}
                                                    </div>
                                                    <div style="line-height: 1em; padding: 1px 1px;color:white">:</div>
                                                    <div class="clock">
                                                        <div id="secs" class="num">&nbsp;</div>
                                                        {{-- <div id="secs-text" class="text">Giây</div> --}}
                                                    </div>
                                    </div>
                                                    </div>
                                <div class="sag-login">
                                   @if (Auth::check())
                                   <div class="menu_ngan ">
                                <ul class="sag_fix ">
                                    <li style="    margin-top: -12px;float: right;">
                                        <a href="# " style="font-size: 16px; line-height: 3em;"><i class="far fa-user" style="margin-right: 0.4em"></i>{{ Auth::user()->name }}</a>
                                        <ul class="sub-menu" style="z-index: 1000;">
                                            @if (Auth::user()->role_id != 0)
                                            <li>
                                                <a href="{{ route('admin') }}"><i class="fas fa-users-cog"></i> Trang quản trị</a>
                                            </li>
                                            @endif
                                            <li>
                                                <a data-toggle="modal" data-target="#exampleModalll" href="# "><i class="fas fa-user-circle"></i> Tài khoản của tôi</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}"><i class="fas fa-sign-out-alt"></i> Thoát tài khoản</a>
                                            </li>


                                        </ul>
                                    </li>

                                </ul>
                            </div>
                            <div class="modal fade" id="exampleModalll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document" style="max-width: 720px;">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Thông tin tài khoản</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="col-md-8 " style="    margin: 1em 7em;" action="{{route('update-user',['id' => auth::user()->id])}}" method="post">
                                                @csrf
                                                <input type="hidden" value="{{auth::user()->id}}">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="form-label">Tên </label>
                                                    <input type="text" class="form-control" name="name" value="{{auth::user()->name}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                                    <input type="text" class="form-control" name="email" value="{{auth::user()->email}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="form-label">Số điện thoại</label>
                                                    <input type="text" class="form-control" name="phone" value="{{auth::user()->phone}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1" class="form-label">Địa chỉ</label>
                                                    <input type="text" class="form-control" name="address" value="{{auth::user()->address}}">
                                                </div>
                                                <div class="form-group">
                                                    <input type="submit" class="btn btn-primary" value="Cập nhật tài khoản">
                                                </div>

                                        </form>
                                    </div>

                                  </div>
                                </div>
                              </div>
                                  @else
                                   <div style="float: right">

                                    <button  style="background: #1893e6; color:white;font-family: Roboto, sans-serif;" >
                                        <a href="{{ route('getdangnhap')}}">Đăng nhập</a>

                                    </button>
                                    <span style="color: white">/</span>
                                    <button   style="background: #1893e6; color:white;font-family: Roboto, sans-serif;"  >
                                        <a href="{{ route('getdangky')}}">Đăng Ký</a>
                                    </button>
                                   </div>
                                   @endif
                                </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end menu -->
            <div>
                <div  class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" style="max-width: 728px;">
                    <div class="modal-content">
                        <div class="modal-header" style="float:right">
                            <button type="button" class="btn btn-primary"   style="margin-right: 0.5em;" >
                                <a href="{{ route('getdangnhap')}}">Đăng nhập</a>
                            </button>
                            <button type="button" class="btn btn-primary"   data-toggle="modal" data-target="#exampleModallll"  >
                                Đăng ký
                            </button>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <div id="login" class="modal-body">
                                <h5 class="modal-title" id="exampleModalLabel">Đăng nhập</h5>

                            <div class="modal-body">
                                <form method="POST"  action="{{ route('dangnhap') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email"  name="email" class="form-control" placeholder="nhập email" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mật khẩu</label>
                                        <input type="password" name="password" placeholder="nhập mật khẩu" class="form-control">
                                    </div>
                                    <button type="submit"  class="btn btn-primary">Đăng nhập</button>

                                </form>
                            </div>

                        </div>


                            <div id="regis" class="modal-body">
                                <h5 class="modal-title" id="exampleModalLabell">Đăng ký</h5>

                            <div class="modal-body">

                               <el-register></el-register>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
            </div>
            <!-- end slide -->



            @yield('content')



            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sag-hangmay">
                    {{-- <div class="hangmay">
                        <a href="#"><span class=""><img src="upload/asus.png" alt=""></span></a>
                    </div>
                    <div class="hangmay">
                        <a href="#"><span class=""><img src="upload/samsung.png" alt=""></span></a>
                    </div>
                    <div class="hangmay">
                        <a href="#"><span class=""><img src="upload/del.png" alt=""></span></a>
                    </div>
                    <div class="hangmay">
                        <a href="#"><span class=""><img src="upload/lg.png" alt=""></span></a>
                    </div>
                    <div class="hangmay">
                        <a href="#"><span class=""><img src="upload/philis.png" alt=""></span></a>
                    </div>
                    <div class="hangmay">
                        <a href="#"><span class=""><img src="upload/lg.png" alt=""></span></a>
                    </div>
                    <div class="hangmay">
                        <a href="#"><span class=""><img src="upload/sharp.png" alt=""></span></a>
                    </div> --}}
                </div>
            </div>

        </div>
    </div>

    </div>


    <div class="help">
        <div class="container">
            <div class="row">
                <div class="content col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <i class="far fa-question-circle"></i>
                    <p>Bạn cần hỗ trợ? Nhấc máy lên và gọi ngay cho chúng tôi -
                        <a href="#">01688287614 </a> hoặc
                    </p>
                    <a class="sag_button_help" href="#">Hỗ trợ trực tiếp</a>
                </div>
            </div>
        </div>
    </div>
    <div class="sag-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="sag-active">
                        <div class="sag-item_policy">
                            <i class="fas fa-globe"></i>
                            <p class="sag-content">Giao hàng toàn quốc</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="sag-active">
                        <div class="sag-item_policy">
                            <i class="fas fa-shield-alt"></i>
                            <p class="sag-content">Bảo mật thanh toán</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="sag-active">
                        <div class="sag-item_policy">
                            <i class="fas fa-sync-alt"></i>
                            <p class="sag-content">Đổi trả trong 7 ngày</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="sag-active">
                        <div class="sag-item_policy2">
                            <i class="fas fa-headphones-alt"></i>
                            <p class="sag-content">Tư vấn miễn phí</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="topfoter">
            <div class="container">
                <div class="top-footer">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 footer-click">
                            <h4 class="sag-cliker">Chính sách chung</h4>
                            <ul class="sag-toggle">
                                <li><a href="#">Trang chủ</a></li>
                                <li><a href="#">Sản phẩm</a></li>
                                <li><a href="#">Khuyến mãi hot</a></li>
                                <li><a href="#">Mua trả góp</a></li>
                                <li><a href="#">Tin tức</a></li>
                                <li><a href="#">Liên hệ</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 footer-click">
                            <h4 class="sag-cliker">Khách hàng</h4>
                            <ul class="sag-toggle">
                                <li><a href="#">Trang chủ</a></li>
                                <li><a href="#">Sản phẩm</a></li>
                                <li><a href="#">Khuyến mãi hot</a></li>
                                <li><a href="#">Mua trả góp</a></li>
                                <li><a href="#">Tin tức</a></li>
                                <li><a href="#">Liên hệ</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 footer-click">
                            <h4 class="sag-cliker">Hỏi đáp</h4>
                            <ul class="sag-toggle">
                                <li><a href="#">Trang chủ</a></li>
                                <li><a href="#">Sản phẩm</a></li>
                                <li><a href="#">Khuyến mãi hot</a></li>
                                <li><a href="#">Mua trả góp</a></li>
                                <li><a href="#">Tin tức</a></li>
                                <li><a href="#">Liên hệ</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 footer-click">
                            <h4 class="sag-cliker">Tư vấn</h4>
                            <ul class="sag-toggle">
                                <li><a href="#">Trang chủ</a></li>
                                <li><a href="#">Sản phẩm</a></li>
                                <li><a href="#">Khuyến mãi hot</a></li>
                                <li><a href="#">Mua trả góp</a></li>
                                <li><a href="#">Tin tức</a></li>
                                <li><a href="#">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="sag-site">
                    <h4>Công ty cổ phần thương mại dịch vụ WICO</h4>
                    <p>Trụ sở chính: 53 Cao Thắng, Hải Châu, Đà Nẵng</p>
                    <p>Điện thoại:<a href="#">0355382715</a></p>
                    <p>Email: <a href="#">sanghpd02840@fpt.edu.vn</a></p>
                </div>
            </div>
            {{-- <div class="modal" id="qc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                      <button type="button" class="close"  data-dismiss="modal"  aria-label="Close">
                        <span aria-hidden="true" id="qch" >&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      ...
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                </div>
              </div> --}}
        </div>
        <div  class="bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sag-botom">
                            <span>@2020 - Bản quyền thuộc về WICO | Cung cấp bởi WICO</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <!--  -->
    </div>
    </div>
    <script>
        $(document).ready(function() {

        $("#anhien").click(function(){
            $("#cart").show();
            // alert('123');
        });

            // $('#cart').hide();
            $('#regis').hide();

            // $('#click_cart_an').click(function() {
            //     $('#cart').toggle();
            //     $('#click_cart_an').hide();
            //     $('#click_cart_hien').show();
            // });
            // $('#click_cart_hien').click(function() {
            //     $('#cart').toggle();
            //     $('#click_cart_hien').hide();
            //     $('#click_cart_an').show();
            // });
            $('#checkCC').click(function() {
                $('#login').show();
                $('#regis').hide();
            });
            $('#checkCC2').click(function() {
                $('#login').hide();
                $('#regis').show();
            });
            // $('#click').click(function() {
            //     $('#login').hide();
            //     $('#regis').show();

            }
            );


    </script>
    <script type="text/javascript" src="/js/app.js"></script>
    <script type="text/javascript" >

    </script>
<script lang="javascript">var __vnp = {code : 4346,key:'', secret : 'c65e21f127b10149dcb8b2f50e0db0a4'};(function() {var ga = document.createElement('script');ga.type = 'text/javascript';ga.async=true; ga.defer=true;ga.src = '//core.vchat.vn/code/tracking.js';var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();</script></body>

</html>
