@extends('client.master')
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
                    <li><span class="sag__">Laptop & PC</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

    
</div>
<div class="container">
    <div class="sag_wp_border">
        <div class="row" style="margin-left: 0px;margin-right: 0px">
            <div class="sag_link_collections  col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-bottom: 40px;">
                <div class="row">
                    <div>
                        <ul class="ul1">
                            <li class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <h1>Laptop & PC</h1>
                            </li>
                            <li>
                                <ul class="sag_ul_responsive_link">
                                    <li class="  ">
                                        <a href="#">Laptop Dell</a>
                                    </li>
                                    <li class="  ">
                                        <a href="#">Laptop Asus</a>
                                    </li>
                                    <li class="  ">
                                        <a href="#">Laptop HP</a>
                                    </li>
                                    <li class="  ">
                                        <a href="#">Laptop Chơi Game</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="dqdt-sidebar col-xs-12 col-lg-3 col-md-3 col-sm-12 col-lg-pull-9 col-md-pull-9">
            <div class="sag_aside-item" style="width:100%">
                <div class="title_module_arrow main">
                    <h2>
                        <span>Tìm Thương Hiệu </span>
                    </h2>
                </div>
                <div class="aside-content filter-group">
                    <ul>
                        <li class="filter-item">
                            <span>
                                <label class="label_relative" for="filter-apple">
                                    <input type="checkbox" id="filter-apple" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Apple" value="(Apple)" data-operator="OR">
                                    <i class="fa"></i>
                                    <span class="filter_tt">Apple</span>
                                </label>
                            </span>
                        </li>
                        <li class="filter-item">
                            <span>
                                <label class="label_relative" for="filter-apple">
                                    <input type="checkbox" id="filter-apple" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Apple" value="(Apple)" data-operator="OR">
                                    <i class="fa"></i>
                                    <span class="filter_tt">Benq</span>
                                </label>
                            </span>
                        </li>
                        <li class="filter-item">
                            <span>
                                <label class="label_relative" for="filter-apple">
                                    <input type="checkbox" id="filter-apple" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Apple" value="(Apple)" data-operator="OR">
                                    <i class="fa"></i>
                                    <span class="filter_tt">Dell</span>
                                </label>
                            </span>
                        </li>
                        <li class="filter-item">
                            <span>
                                <label class="label_relative" for="filter-apple">
                                    <input type="checkbox" id="filter-apple" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Apple" value="(Apple)" data-operator="OR">
                                    <i class="fa"></i>
                                    <span class="filter_tt">HP</span>
                                </label>
                            </span>
                        </li>
                        <li class="filter-item">
                            <span>
                                <label class="label_relative" for="filter-apple">
                                    <input type="checkbox" id="filter-apple" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Apple" value="(Apple)" data-operator="OR">
                                    <i class="fa"></i>
                                    <span class="filter_tt">Lenovo</span>
                                </label>
                            </span>
                        </li>
                        <li class="filter-item">
                            <span>
                                <label class="label_relative" for="filter-apple">
                                    <input type="checkbox" id="filter-apple" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Apple" value="(Apple)" data-operator="OR">
                                    <i class="fa"></i>
                                    <span class="filter_tt">LG</span>
                                </label>
                            </span>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sag_aside-item" style="width:100%">
                <div class="title_module_arrow main">
                    <h2>
                        <span>Tìm mất giá </span>
                    </h2>
                </div>
                <div class="aside-content filter-group">
                    <ul>
                        <li class="filter-item">
                            <span>
                                <label class="label_relative" for="filter-apple">
                                    <input type="checkbox" id="filter-apple" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Apple" value="(Apple)" data-operator="OR">
                                    <i class="fa"></i>
                                    <span class="filter_tt">Giá dưới 100.000đ</span>
                                </label>
                            </span>
                        </li>
                        <li class="filter-item">
                            <span>
                                <label class="label_relative" for="filter-apple">
                                    <input type="checkbox" id="filter-apple" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Apple" value="(Apple)" data-operator="OR">
                                    <i class="fa"></i>
                                    <span class="filter_tt">100.000đ - 200.000đ</span>
                                </label>
                            </span>
                        </li>
                        <li class="filter-item">
                            <span>
                                <label class="label_relative" for="filter-apple">
                                    <input type="checkbox" id="filter-apple" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Apple" value="(Apple)" data-operator="OR">
                                    <i class="fa"></i>
                                    <span class="filter_tt">200.000đ - 300.000đ</span>
                                </label>
                            </span>
                        </li>
                        <li class="filter-item">
                            <span>
                                <label class="label_relative" for="filter-apple">
                                    <input type="checkbox" id="filter-apple" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Apple" value="(Apple)" data-operator="OR">
                                    <i class="fa"></i>
                                    <span class="filter_tt">300.000đ - 500.000đ</span>
                                </label>
                            </span>
                        </li>
                        <li class="filter-item">
                            <span>
                                <label class="label_relative" for="filter-apple">
                                    <input type="checkbox" id="filter-apple" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Apple" value="(Apple)" data-operator="OR">
                                    <i class="fa"></i>
                                    <span class="filter_tt">500.000đ - 1.000.000đ</span>
                                </label>
                            </span>
                        </li>
                    
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
                            <li class="filter-item">
                                <span>
                                    <label class="label_relative" for="filter-apple">
                                        <input type="checkbox" id="filter-apple" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Apple" value="(Apple)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Laptop</span>
                                    </label>
                                </span>
                            </li>
                            <li class="filter-item">
                                <span>
                                    <label class="label_relative" for="filter-apple">
                                        <input type="checkbox" id="filter-apple" onchange="toggleFilter(this)" data-group="Hãng" data-field="vendor" data-text="Apple" value="(Apple)" data-operator="OR">
                                        <i class="fa"></i>
                                        <span class="filter_tt">Màn Hình</span>
                                    </label>
                                </span>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div>
            <div class="main_container col-lg-9 col-md-9 col-sm-12 col-lg-push-3 col-md-push-3">
                <div class="category-products">
                    <div class="products-view">
                        <div class="row row-gutter-14">
                           @foreach ($dataProduct as $item)
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