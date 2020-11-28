@extends('client.master')

@section('content')
<div class="sag_product margin-top-20">
    <div class="container">
        <div class="row">
            <el-info-product user="{{ Auth::user()->id }}"></el-info-product>
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
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>

@endsection