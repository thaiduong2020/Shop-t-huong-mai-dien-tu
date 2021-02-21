<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Favourite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class ProductFavourite extends Controller
{

    public function add_fvr(Request $request){
    	$data['product_id'] = $request->id;
    	$data['user_id'] = Session::get('user_id');
    	Favourite::insert($data);
    }
    public function remove_fvr(Request $request){
    	Favourite::where('product_id', '=', $request->id)->delete();
    }
    public function list(){
    	$product =  Product::join('favourite', 'products.id', '=', 'favourite.product_id')
		            ->select('products.*')
		            ->where('favourite.user_id', '=', Session::get('user_id'))
		            ->get();
		$dataCategories = Categories::all();
		return view('client.favourite-product',compact('product','dataCategories'));
    }
    public function load(){
    	$product =  Product::join('favourite', 'products.id', '=', 'favourite.product_id')
		            ->select('products.*')
		            ->where('favourite.user_id', '=', Session::get('user_id'))
		            ->get();
		$data = '';
		$stt = 0;
		foreach ($product as $item){
			$id = $item->id  ;
			$image = $item->image ;
			$name = $item->name;
			$price = $item->price ;
			$data.='<div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 product-col" style="padding-left: 4px!important;max-width: 25%;">
                                <div class="product-item-main">
                                    <div class="product-item-image" style="height: 175px;">
                                        <a href="/info-products/'.$id.'"><img class="img-product" src="/'.$image.'" alt=""></a>
                                    </div>
                                    <div class="product-bottom">
                                        <h3 class="product-name"><a href="/info-products/'.$id.'">'.$name.' </a></h3>
                                        <div class="price-box">
                                            <span>'.$price.' đ</span>
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
                                        <div class="actived" id="prodcut-favourite">
                                                <a href="javascript:removeFavourite('.$stt.','.$id.');" ><i class="fas fa-heart"></i></a>

                                        </div>

                                    </div>
                                </div>
                            </div>';
                            $stt++;
		}
		echo $data;
    }
}
