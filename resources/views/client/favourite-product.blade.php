@extends('client.master')
@section('title')
    Sản phẩm yêu thích
@endsection
@section('content')
<div class="sag_bread_crumb">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 a-left">
                <ul class="sag_bread">
                    <li>
                        <a href="#"><span>Trang chủ</span></a>
                        <span class="sag_icon"><i class="fas fa-caret-right"></i></span>
                    </li>
                    <li><span class="sag__">sản phẩm yêu thích</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>


</div>
<div class="container">
    <div class="sag_wp_border">
        <div class="row" style="margin-left: 0px;margin-right: 0px">
            <div class="main_container col-lg-9 col-md-9 col-sm-12 col-lg-push-3 col-md-push-3">
                <div class="category-products">
                    <div class="products-view">
                        <div class="row row-gutter-14" id="row-favourite">
                            @php $stt = 0; @endphp
                            @foreach ($product as $item)
                           <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product-col" style="padding-left: 4px!important;max-width: 25%;">
                                <div class="product-item-main">
                                    <div class="product-item-image" style="height: 175px;">
                                        <a href="/info-products/{{$item->id  }}"><img class="img-product" src="{{ '/'.$item->image }}" alt=""></a>
                                    </div>
                                    <div class="product-bottom">
                                        <h3 class="product-name"><a href="/info-products/{{$item->id  }}">{{ $item->name }} </a></h3>
                                        <div class="price-box">
                                            <span>{{ $item->price }}đ</span>
                                        </div>
                                        <div class="review_star">
                                            <div class="iconsao">
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="actived" id="product-favourite">
                                                <a href="javascript:removeFavourite({{$stt  }},{{$item->id  }});" ><i class="fas fa-heart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @php $stt++; @endphp
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>

@endsection
