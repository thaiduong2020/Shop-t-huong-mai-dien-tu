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

    <title>Trang Chủ</title>

    <style>
        @import url(https://fonts.googleapis.com/css?family=Lato:300,400,700);
        a.animated-button.victoria-four {
            border: 1px solid #ffffff;
            width: 10em;
            font-family: 'Lato', sans-serif;
            color: #ffffff;
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
                                        <a href="#" class="logo_wrapper">
                                            <img src="/storage/image/logo.png" alt="logo">
                                        </a>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 col-search-engine">
                                        <div class="sag_header_search">
                                            <form class="input-group search-bar" action="/search" method="get" role="search">

                                                <div class="input-group ">
                                                    <input class="form-control" type="text" placeholder="Search" aria-label="Search">

                                                </div>



                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-2 hidden-sm hidden-xs">
                                        <div class="phone_main_menu" style="padding: 0em 32px;line-height: 7.3em;">
                                            <div class="downdown_cart hidden-sm hidden-xs">
                                                <div class="cart_ico inline-block ico_width">
                                                    <div class="mini-cart">
                                                        <div class="row">
                                                            <div class="col-md-3 col-sm-3 col-xs-6">
                                                                <a href="#" class="btn btn-sm animated-button victoria-four"> <i style="font-size: 26px;cursor:pointer" id="click_cart_an" style="font-size: 23px" class="fa fa-shopping-bag text-light"></i>
                                                                    <i style="font-size: 26px;cursor:pointer" id="click_cart_hien" style="font-size: 23px" class="fa fa-shopping-bag text-light"></i> Giỏ hàng ( @if (Session::has('Cart')) {{Session('Cart')->totalQty}}
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
                        <div class="media-body">
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
                        <a href="{{ route('getCheckout')}}" class="beta-btn primary text-center">Checkout <i style="font-size: 10px;padding-left: 5px;color: #f90;" class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
            @endif

            <!-- end header -->
            <!-- menu -->
            <div class="sag_warp_main">
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
                                            <li><a href="/">Trang Chủ</a></li>
                                            <li>
                                                <a href="#">Sản Phẩm</a>
                                                <ul class="sub-menu">

                                                    @foreach ($dataCategories as $item) @if ($item->parent_id == 0) @foreach ($dataCategories as $item2) @if ($item2->parent_id == $item->id )
                                                    <li>
                                                        <a href="{{ route('products',['id' => $item2->id]) }}">{{ $item2->name }}</a>
                                                        <ul class="sub-menu2" style="margin-left: 0.7rem;">

                                                            @foreach ($dataCategories as $item3) @if ($item3->parent_id == $item2->id)
                                                            <li><a href="{{ route('products',['id' => $item3->id]) }}">{{ $item3->name }}</a></li>

                                                            @endif @endforeach
                                                        </ul>

                                                    </li>
                                                    @endif @endforeach @endif @endforeach
                                                </ul>
                                            </li>
                                            <li><a href="#">Khuyến Mãi Hot</a></li>
                                            <li><a href="#">Mua Trả Góp</a></li>
                                            <li>
                                                <a href="#">Tin Tức</a>
                                                <ul class="sub-menu">
                                                    <li><a href="#">Kinh Nghiệm Mua Sắm</a></li>
                                                    <li><a href="#">Kỹ Thuật Số</a></li>
                                                    <li><a href="#">Điện Máy</a></li>
                                                    <li><a href="#">Đồ Gia Dụng</a></li>
                                                    <li><a href="#">Phụ Kiện</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Liên Hệ</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="sag-login">
                                   @if (Auth::check())
                                   <div class="menu_ngan ">
                                <ul class="sag_fix ">
                                    <li>
                                        <a href="# "><i class="far fa-user"></i>{{ Auth::user()->name }}</a>
                                        <ul class="sub-menu" style="z-index: 1000;">
                                            <li>
                                                <a href="# ">Tài khoản của tôi</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}">Thoát tài khoản</a>
                                            </li>

                                        </ul>
                                    </li>

                                </ul>
                            </div>
                                  @else
                                    <button  style="background: #1893e6;" data-toggle="modal" data-target="#exampleModal">
                                        Đăng nhập
                                    </button>
                                    <button  style="background: #1893e6;" data-toggle="modal" data-target="#exampleModal">
                                        Đăng Ký
                                    </button>
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
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="float:right">
                            <button type="button" class="btn btn-primary" id="checkCC"  >
                                Đăng nhập
                            </button>
                            <button type="button" class="btn btn-primary" id="checkCC2"  >
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
                                        <input type="email"  name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mật khẩu</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <button type="submit"  class="btn btn-primary">Đăng nhập</button>
            
                                </form>
                            </div>
                              
                        </div>
                     
            
                            <div id="regis" class="modal-body">
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
                        <div class="modal-footer" >
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                            <button type="button" class="btn btn-primary">Đăng nhập</button>
                        </div>
            
                    </div>
                </div>
            </div>
            </div>
            <!-- end slide -->



            @yield('content')



            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sag-hangmay">
                    <div class="hangmay">
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
                    </div>
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
                    <h4>Công ty cổ phần thương mại dịch vụ pow market</h4>
                    <p>Trụ sở chính: 53 Cao Thắng, Hải Châu, Đà Nẵng</p>
                    <p>Điện thoại:<a href="#">0355382715</a></p>
                    <p>Email: <a href="#">sanghpd02840@fpt.edu.vn</a></p>
                </div>
            </div>

        </div>
        <div class="bottom-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sag-botom">
                            <span>@2018 - Bản quyền thuộc về TL Creative | Cung cấp bởi Sapo</span>
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
            // $('#cart').hide();
            $('#regis').hide();
            $('#click_cart_hien').hide();
            $('#click_cart_an').click(function() {
                $('#cart').toggle();
                $('#click_cart_an').hide();
                $('#click_cart_hien').show();
            });
            $('#click_cart_hien').click(function() {
                $('#cart').toggle();
                $('#click_cart_hien').hide();
                $('#click_cart_an').show();
            });
            $('#checkCC').click(function() {
                $('#login').show();
                $('#regis').hide();
            });
            $('#checkCC2').click(function() {
                $('#login').hide();
                $('#regis').show();
            });
        })
       
    </script>
    <script type="text/javascript" src="/js/app.js"></script>
    <script type="text/javascript" >
     
    </script>

</body>

</html>