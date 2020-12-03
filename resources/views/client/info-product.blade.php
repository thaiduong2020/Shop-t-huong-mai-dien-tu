@extends('client.master')
@section('title')
    Chi tiết sản phẩm
@endsection

@section('content')
<div class="sag_bread_crumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 a-left">
                <ul class="sag_bread">
                    <li>
                        <a href="{{ route('home') }}"><span>Trang chủ</span></a>
                        <span class="sag_icon"><i class="fas fa-caret-right"></i></span>
                    </li>
                    <li><span class="sag__">Chi tiết sản phẩm</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

    
</div>
<div class="sag_product margin-top-20">
    <div class="container">
        <div class="row">
                
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                                 
                <el-info-product @if (Auth::check())
                user="{{ Auth::user()->id }}"
                @endif></el-info-product>
            </div>
           
            
                <div class="col-md-12 col-lg-3 col-sm-12 col-xs-12">
                    <div class="sag_aside_product_index">
                        <div class="sag_product">
                            <div class="sag_item_policy">
                                <i class="fas fa-truck"></i>
                                <p class="content">Miễn phí vận chuyển cho đơn hàng có giá trị trên 1 triệu</p>
                            </div>
                            <div class="sag_item_policy">
                                <i class="far fa-clock"></i>
                                <p class="content">Giao hàng ngay sau khi đặt hàng (áp dụng với Hà Nội & HCM)</p>
                            </div>
                            <div class="sag_item_policy">
                                <i class="fas fa-sync"></i>
                                <p class="content">Đổi trả trong 7 ngày, thủ tục đơn giản nhanh chóng</p>
                            </div>
                            <div class="sag_item_policy">
                                <i class="fab fa-pinterest-square"></i>
                                <p class="content">Nhà cung cấp xuất hóa đơn cho sản phẩm này</p>
                            </div>
                            <div class="sag_item_policy" style="background: white">
                                <h3 class="content" style="color: black;">Sản phẩm</h3>
                            </div>
                            <el-cungloai></el-cungloai>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>



@endsection