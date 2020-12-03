@extends('client.master')
@section('title')
   Trang chủ
@endsection
@section('content')
<div class="sag_slide_inedex">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="row">
                    <div class="sag_menu_header">
                        <ul>
                            @foreach ($dataCategories as $item)
                                @if ($item->parent_id == 0)
                                            <li>
                                                <a href="{{ route('products',['id' => $item->id]) }}">{{ $item->name }}</a>
                                                <ul class="sub-menu-header">
                                                @foreach ($dataCategories as $item3)
                                                @if ($item3->parent_id == $item->id)
                                                <li><a href="{{ route('products',['id' => $item3->id]) }}">{{ $item3->name }}</a></li>
                                                    
                                                @endif
                                                @endforeach
                                            </ul>

                                            </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    <div class="sag_baner ">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators" >
                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" style="border-radius: 3px;">
                              <div class="carousel-item active" style="opacity: 10">
                                <img class="d-block w-100" src="/storage/image/slider_2.png" alt="First slide">
                              </div>
                              <div class="carousel-item" style="opacity: 10">
                                <img class="d-block w-100" src="/storage/image/slider_1.png" alt="Second slide">
                              </div>
                              <div class="carousel-item" style="opacity: 10">
                                <img class="d-block w-100" src="/storage/image/slider_2.png" alt="Third slide">
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>

                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end slide -->

        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mt-4">
                    <div class="sag-tieude">
                        <div class="sag-icon">
                        <span class="icon">
                            <i class="fas fa-bolt"></i>
                        </span>
                        </div>
                        <h2 class="fsash"><a class="flash" href="#" title="flash sale">FLASH SALE </a></h2>
                        <div class="deal">
                            <span>Khuyến mãi đã kết thúc </span>
                        </div>
                        <a class="xtc" href="#">Xem tất cả <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="sag_product_index" style="height: 234px;">
                        @foreach ($dataProduct2 as $item)
                        
                            <div class="sag_nd" style="height:257px">
                                
                                <div class="sag_nd_img">
                                    <a href="{{ route('info-products',['id' => $item->id]) }}"><img src="{{ $item->image }}" alt=""></a>
                                </div>
                                <div class="sag_nd_sanpham">
                                    <h3 class="sag_tensanpham">
                                        <a href="{{ route('products',['id' => $item->id]) }}">{{ $item->name }}</a>
                                    </h3>
                                    <div class="sag_giasanpham">
                                        <span class="gia_chinh">{{ $item->price }}</span>
                                    </div>
                                    <div class="sag_review">
                                    </div>
                                </div>

                            </div>
                        @endforeach
                        
                        
                    </div>
                </div>
            </div>
                <!-- end khuyến mãi kết thúc -->

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sag-tieudedt">
                            <div class="sag-icondt">
                            <span class="icondt">
                                <i class="fas fa-mobile-alt"></i>                                    
                            </span>
                            </div>
                            <div>
                                <h2><a class="flashdt" href="#" title="flash sale">MOBILE & TABLET </a></h2>
                            </div>
                            <a class="xtc" href="#">tất cả <i class="fas fa-arrow-right"></i></a>
                            <a class="xtc" href="/products/123">Tablet </i></a>
                            <a class="xtc" href="/products/86">Laptop & PC </i></a>
                            <a class="xtc" href="/products/84">Điện thoại </i></a> 
                        </div>
                           
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="row d-flex ">
                            
                                         <el-product-1></el-product-1>
                                     
                                      
                                    
                                  
                                
                                </div>
                                
                            </div>
                           
                        </div>
                    </div>
                    <div class="container d-flex mt-4">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 pl-0">
                            <div >
                                <a href="#">
                                    <div class="hover15 column">
                                        <div>
                                          <figure><img src="upload/banner_large1.png" alt="" style="width: 100%;"></figure>
                                        </div>
                                       
                                      </div>
                                    </a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 pr-0">
                            <div class=" ">
                                <a href="#">
                                    <div class="hover15 column">
                                        <div>
                                          <figure><img src="upload/banner_large2.png" alt="" style="width:100%"></figure>
                                        </div>
                                       
                                      </div>
                                    </a>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <!-- end mobile & tablet -->
                <div class="row justify-content-center mt-4" >
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <div class="sag-tieude">
                            <div class="sag-icon">
                                <span class="icon">
                                <i class="fas fa-tv"></i>
                            </span>
                            </div>
                            <h2 class="kts"><a class="flash" href="#" title="flash sale">KỸ THUẬT SỐ </a></h2>
                            <div class="deal">
                            </div>
                            <a class="xtc" href="#">Xem tất cả <i class="fas fa-arrow-right"></i></a>
                            <a class="xtc" href="#">tất cả <i class="fas fa-arrow-right"></i></a>
                            <a class="xtc" href="#">Tablet </i></a>
                            <a class="xtc" href="#">Laptop & PC </i></a>
                            <a class="xtc" href="#">Điện thoại </i></a>
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                        <div class="row d-flex ">
                          
                                       <el-product-2></el-product-2>
                                   
                                   
                                
                                
                           
                               
                                
                                </div>
                                
                            </div>
                           
                        </div>
                        <div class="row justify-content-center mt-4" >
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                <div class="sag-tieudedt">
                                    <div class="sag-icondt">
                                    <span class="icondt">
                                        <i class="fas fa-mobile-alt"></i>
                                    </span>
                                    </div>
                                    <h2><a class="flashdt" href="#" title="flash sale">ĐIỆN MÁY </a></h2>
                                    <a class="xtc" href="#">tất cả <i class="fas fa-arrow-right"></i></a>
                                    <a class="xtc" href="#">Tablet </i></a>
                                    <a class="xtc" href="#">Laptop & PC </i></a>
                                    <a class="xtc" href="#">Điện thoại </i></a>   
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
                                <div class="row d-flex ">
                                   
                                                   <el-product-3></el-product-3>
                                               
                                               
                                            
                                            
                                        
                                        </div>
                                        
                                    </div>
                                   
                                </div>
                               
                                           
                                        </div>
                                        <div class="row  justify-content-center" style="    margin-top: 2em;">
                                            <div class="col-10 d-flex" >
                                                <div class="col-md-3 pl-0">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0">
                                                        <div class="sag-tieude">
                                                            <div class="sag-icondg">
                                                            <span class="icon">
                                                                <i class="far fa-comments"></i>
                                                            </span>
                                                            </div>
                                                            <h2 class="danhgia" style="width: 79.8%;"><a class="flash" href="#" title="flash sale">Đánh giá </a></h2>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pl-0">
                                                        <div class="sag_danhgia">
                                                            <div class="sag_testimonial">
                                                                <div class="sag_testimg">
                                                                    <img src="upload/client1.png">
                                                                </div>
                                                                <div class="sag_testten">
                                                                    <h3 class="sag_testtitle">
                                                                       Thanh Lâm
                                                                    </h3>
                                                                    <span>Kỹ Thuật Viên</span>
                                                                    <ul class="star-reviews">
                                                                        <li><i class="fas fa-star"></i></li>
                                                                        <li><i class="fas fa-star"></i></li>
                                                                        <li><i class="fas fa-star"></i></li>
                                                                        <li><i class="fas fa-star"></i></li>
                                                                        <li><i class="fas fa-star"></i></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="sag_testbinhluan">
                                                                    <p class="sag_binhluan">
                                                                        Mình đã dành rất nhiều thời gian để mua sắm, đến khi mình biết website này là một siêu thị mini online từ đó mình chỉ tin tưởng mua hàng ở đây thui, ở đây có đầy đủ mọi thứ mà mình thích. Tất nhiên sản phẩm ở đầy đều có bảo hành dài cho các thiết bị điện tử điện lạnh, còn thứ khác thì mình còn yên tâm về xuất xứ và chất lượng nữa
                            
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   </div>
                                                   <div class="col-md-9 d-flex " style="flex-wrap: wrap" >
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="sag-tieude">
                                                            <div class="sag-iconttm">
                                                            <span class="icon">
                                                                <i class="fas fa-globe"></i>
                                                            </span>
                                                            </div>
                                                            <h2 class="ttm" style="width: 41.4%;"><a class="flash" href="#" title="flash sale">Tin tức mới</a></h2>
                                                            <div class="deal">
                                                            </div>
                                                            <a class="xtc" href="#">Xem tất cả <i class="fas fa-arrow-right"></i></a>
                                                        </div>
                                                    </div>
                                                   
                                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="sag_tintuc">
                                                            <a class="" href="#"><img src="upload/galaxy-a5-2018.jpg" alt="" style="width:100%;"></a>
                                                            <a class="sag_tintuc_nd" href="#">
                                                                Loạt smartphone màu sắc mới lạ vừa lên kệ sẵn sàng đấu kiếm với nhiều mẫu điện thoại cấu hình khủng
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="sag_tintucnb">
                                                            <div class="sag_tintuc2">
                                                                <div class="blog_img">
                                                                    <a href="#">
                                                                        <img src="upload/may-lanh-toshiba.jpg" width="100%">
                                                                    </a>
                                                                </div>
                                                                <div class="sag_content__">
                                                                    <h3><a class="nd__" href="#">Những yếu tố quan trọng khi chọn điều hòa không khí</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sag_tintucnb">
                                                            <div class="sag_tintuc2">
                                                                <div class="blog_img">
                                                                    <a href="#">
                                                                        <img src="upload/may-lanh-toshiba.jpg" width="100%">
                                                                    </a>
                                                                </div>
                                                                <div class="sag_content__">
                                                                    <h3><a class="nd__" href="#">Những yếu tố quan trọng khi chọn điều hòa không khí</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sag_tintucnb">
                                                            <div class="sag_tintuc2">
                                                                <div class="blog_img">
                                                                    <a href="#">
                                                                        <img src="upload/may-lanh-toshiba.jpg" width="100%">
                                                                    </a>
                                                                </div>
                                                                <div class="sag_content__">
                                                                    <h3><a class="nd__" href="#">Những yếu tố quan trọng khi chọn điều hòa không khí</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="sag_tintucnb">
                                                            <div class="sag_tintuc2">
                                                                <div class="blog_img">
                                                                    <a href="#">
                                                                        <img src="upload/may-lanh-toshiba.jpg" width="100%">
                                                                    </a>
                                                                </div>
                                                                <div class="sag_content__">
                                                                    <h3><a class="nd__" href="#">Những yếu tố quan trọng khi chọn điều hòa không khí</a></h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                   </div>
                                            </div>
                                         </div>
                    </div>
                    
@endsection