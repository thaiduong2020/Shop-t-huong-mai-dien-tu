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
    <link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" >
    <link rel="stylesheet" href="//cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css" >
    <link rel="stylesheet" href="/fontawesome-free-5.15.1-web/css/all.min.css">
<link rel="stylesheet" href="/css/css.css">
<link rel="stylesheet" href="/fontawesome-free-5.15.1-web/css/all.min.css">		<link rel="stylesheet" href="//cdn.jsdelivr.net/themify-icons/0.1.2/css/themify-icons.css" >
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="/fontawesome-free-5.15.1-web/css/all.min.css">

    <title>Trang Chủ</title>
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
                                    <img src="upload/logo.png" alt="logo">
                                </a>
                            </div>
                            <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 col-search-engine">
                                <div class="sag_header_search">
                                    <form class="input-group search-bar" action="/search" method="get" role="search">
                                       
                                        <div class="input-group ">
                                            <div class="input-group-prepend">
                                              <button class="btn  dropdown-toggle" style="background:#f5f5f5" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</button>
                                              <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div role="separator" class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                              </div>
                                            </div>
                                            <input type="text" class="form-control" aria-label="Text input with dropdown button">
                                          </div>
                                          
                                        
                                        
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-2 hidden-sm hidden-xs">
								<div class="phone_main_menu" style="padding: 3em 32px;">
									<div class="downdown_cart hidden-sm hidden-xs">
										<div class="cart_ico inline-block ico_width">
											<div class="mini-cart">
												<a class="cart_pcs text-light" href="/cart">
													<i class="ion-bag"></i> &nbsp;
													<span class="t_line">Giỏ hàng&nbsp;
														<span class="cartCount  count_item_pr"></span>
													</span>
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
                                    <li><a href="#">Trang Chủ</a></li>
                                    <li>
                                        <a href="#">Sản Phẩm</a>
                                        
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
                            <a href="#">Đăng Ký</a>
                            <a href="#">Đăng Nhập</a>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <!-- end menu -->
     
        <!-- end slide -->
     
                <div class="container">
                    

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
                            <a href="#">01688287614 </a>
                            hoặc
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
            <footer >
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
<script type="text/javascript" src="/js/app.js"></script>

</body>
</html>