<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Categories;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function master(){
        $dataProduct = Product::paginate(10);
        $dataCategories = Categories::where('parent_id', 0)->get();
        return view('client.master',compact('dataProduct','dataCategories'));
    }
    public function info(){
        $dataProduct = Product::paginate(10);
        $dataCategories = Categories::where('parent_id', 0)->get();
        return view('client.info-product',compact('dataProduct','dataCategories'));
    }
    public function index(){
        $dataProduct = Product::paginate(10);
        $dataCategories = Categories::all();
        return view('client.index',compact('dataProduct','dataCategories'));
    }
    public function products($id){
        $dataCategories = Categories::where('parent_id', 0)->get();
        $dataProduct = Product::where('id_category',$id)->paginate(10);
        $dataProduct2 = Product::where('id_brand', $id)->paginate(10);
        
        return view('client.product',compact('dataProduct','dataCategories','dataProduct2'));
    }
}
