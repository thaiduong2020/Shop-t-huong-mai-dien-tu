@extends('client.master')
@section('title')
    Sản phẩm
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
                    <li><span class="sag__">Danh sách sản phẩm</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

    
</div>
<div class="container">
    <div class="sag_wp_border">
        <div class="row" style="margin-left: 0px;margin-right: 0px">
           
            <div class="dqdt-sidebar col-xs-12 col-lg-3 col-md-3 col-sm-12 col-lg-pull-9 col-md-pull-9">
            <div class="sag_aside-item" style="width:100%">
                <div class="title_module_arrow main">
                    <h2>
                        <span>Tìm Thương Hiệu </span>
                    </h2>
                </div>
                <div class="aside-content filter-group">
                    <ul>
                       <div>
                       @foreach ($dataCategoriess as $item)
                           @if ($item->parent_id == 0)
                               @foreach ($dataCategoriess as $item2)
                                @if ($item2->parent_id == $item->id)
                                <li class="filter-item">
                                    <span>
                                        <label class="label_relative" for="filter-apple">
                                            <i class="fa"></i>
                                            <span class="filter_tt"><a style="color: #555;text-decoration: none;" href="{{ route('products',['id' => $item2->id]) }}">{{ $item2->name }}</a></span>
                                        </label>
                                    </span>
                                </li>
                               
                                @endif
                               @endforeach
                           @endif
                       @endforeach
                       </div>
                    </ul>
                </div>
            </div>
            
                <div class="sag_aside-item" style="width:100%">
                    <div class="title_module_arrow main">
                        <h2>
                            <span>Tìm Loại sản phẩm </span>
                        </h2>
                    </div>
                    <div class="aside-content filter-group">
                        <ul>
                            @foreach ($dataCategoriess as $item)
                            @if ($item->parent_id == 0)
                            <li class="filter-item">
                                <span>
                                    <label class="label_relative" for="filter-apple">
                                        <i class="fa"></i>
                                        <span class="filter_tt"><a style="color: #555;text-decoration: none;" href="{{ route('products',['id' => $item->id]) }}">{{ $item->name }}</a></span>
                                    </label>
                                </span>
                            </li>
                            @endif
                            @endforeach
                           
                          
                           
                        </ul>
                    </div>
                </div>
            </div>
            <div class="main_container col-lg-9 col-md-9 col-sm-12 col-lg-push-3 col-md-push-3">
                <div class="category-products">
                    <div class="products-view">
                        <div class="row row-gutter-14">
                           @foreach ($dataProduct as $item)
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
                                </div>
                            </div>
                        </div>
                        
                        @endforeach
                          

                            
                           
                        @foreach ($dataProduct2 as $item)
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product-col" style="padding-left: 4px!important;max-width: 26%;">
                         <div class="product-item-main">
                             <div class="product-item-image" style="height: 175px;">
                                 <a href="#"><img style="    padding: 1em;
                                     height: 100%;width: 100%;" src="{{ '/'.$item->image }}" alt=""></a>
                             </div>
                             <div class="product-bottom">
                                 <h3 class="product-name"><a href="#">{{ $item->name }} </a></h3>
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
                             </div>
                         </div>
                     </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection