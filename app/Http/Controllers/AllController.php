<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Categories;
use App\Models\Favourite;
use App\Models\Contact;
use App\Models\User;
use App\Models\Role;
use App\Models\Comment;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
class AllController extends Controller
{
    public function master(){
        $dataProduct = Product::paginate(10);
        $dataCategories = Categories::where('parent_id', 0)->paginate(10);
        return view('client.master',compact('dataProduct','dataCategories'));
    }
    public function info($id){
        $dataProduct2 = Product::find($id);
        $dataProduct = Product::paginate(10);
        $dataCategories = Categories::all();
        $dataImg = ProductImage::all();
        return view('client.info-product',compact('dataProduct','dataCategories','dataProduct2','dataImg'));
    }
    public function index(){
        $dataProduct = Product::paginate(10);
        $dataProduct2 = Product::where('id_category' , 103)->take(5)->get();
        $dataCategories = Categories::all();
        return view('client.index',compact('dataProduct','dataCategories','dataProduct2'));
    }
    public function allproduct(){
        $dataProduct = Product::paginate(10);
        $dataCategories = Categories::where('parent_id', 0)->get();
        $dataCategoriess = Categories::all();
        $dataProduct2 = Product::where('id_brand')->paginate(10);
        if(Session::get('user_id')){
            $dataFavourite = Favourite::where('user_id',Session::get('user_id'))->paginate(10);
            return view('client.product',compact('dataProduct','dataCategories','dataCategoriess','dataProduct2','dataFavourite'));
        }
        return view('client.product',compact('dataProduct','dataCategories','dataCategoriess','dataProduct2'));
    }
    public function products($id){
        $dataCategories = Categories::where('parent_id', 0)->get();
        $dataCategoriess = Categories::all();
        $dataProduct = Product::where('id_category',$id)->paginate(10);
        $dataProduct2 = Product::where('id_brand', $id)->paginate(10);
        if(Session::get('user_id')){
            $dataFavourite = Favourite::where('user_id',Session::get('user_id'))->paginate(10);
            return view('client.product',compact('dataProduct','dataCategories','dataCategoriess','dataProduct2','dataFavourite'));
        }
        return view('client.product',compact('dataProduct','dataCategories','dataCategoriess','dataProduct2'));

    }
    public function ADproduct(){
        $user = auth::user();
        if($user->can('view', Product::class)){
            $role = Role::all();
            return view('admin.product.index',compact('role'));
        }

        return view('admin.403');
    }

    public function bill(){
        $user = auth::user();
        if($user->can('view', Order::class)){
            $role = Role::all();
            return view('admin.bills.bill',compact('role'));
        }

        return view('admin.403');

    }

    public function search(Request $request){
        try {
            $product = Product::where('name', 'like', '%' . $request->val . '%')
        ->orWhere('price', 'like', '%' . $request->val . '%')->take(5)
        ->get();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function search2(Request $request){
        try {
            $product = Product::where('name', 'like', '%' . $request->search . '%')
        ->orWhere('price', 'like', '%' . $request->search . '%')
        ->get();
        // dd($product);
        $dataCategories = Categories::where('parent_id', 0)->get();
        $dataCategoriess = Categories::all();
        if(Session::get('user_id')){
            $dataFavourite = Favourite::where('user_id',Session::get('user_id'))->paginate(10);
            return view('client.search',compact('dataCategories','dataCategoriess','dataFavourite','product'));
        }
        return view('client.search',compact('dataCategories','dataCategoriess','product'));
        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    public function comment(){
        $user = auth::user();
        if($user->can('view', Comment::class)){
            $role = Role::all();
            return view('admin.comments.index',compact('role'));
        }
        return view('admin.403');
    }
    public function khuyenmai(){
        $dataProduct = Product::paginate(10);
        $dataCategories = Categories::where('parent_id', 0)->get();
        return view('client.khuyen-mai',compact('dataProduct','dataCategories'));

    }
    public function tragop(){
        $dataProduct = Product::paginate(10);
        $dataCategories = Categories::where('parent_id', 0)->get();
        return view('client.tra-gop',compact('dataProduct','dataCategories'));

    }
    public function lienhe(){
        $dataProduct = Product::paginate(10);
        $dataCategories = Categories::where('parent_id', 0)->get();
        return view('client.lien-he',compact('dataProduct','dataCategories'));

    }

    public function contact(Request $request){
        $contact =  new Contact;

        $contact->id_user = $request->id_user;
        $contact->message = $request->message;

        $contact->save();
        return back()->with('mes','Gửi liên hệ thành công !');
    }
    public function updateUser(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;

        $user->update();

        return back();
    }


    public function admin(){
        $categories = Categories::all();
        $product = Product::all();
        $comment = Comment::all();
        $user = User::all();
        $role = Role::all();
        $order = Order::all();
        return view('admin.index',compact('categories','product','comment','user','role','order'));
    }
    function adddotstring($strNum) {

        $len = strlen($strNum);
        $counter = 3;
        $result = "";
        while ($len - $counter >= 0)
        {
            $con = substr($strNum, $len - $counter , 3);
            $result = '.'.$con.$result;
            $counter+= 3;
        }
        $con = substr($strNum, 0 , 3 - ($counter - $len) );
        $result = $con.$result;
        if(substr($result,0,1)=='.'){
            $result=substr($result,1,$len+1);
        }
        echo $result;
        // return $result;
}
}
