<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\User;
use App\Models\Customer;
use App\Models\Cart;
class CartController extends Controller
{
    public function addCart(Request $request,$id){
            $type = Categories::all();
            $product = Product::find($id);
          if($product != null){
            $oldCart = Session('Cart') ? Session::get('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->Add($product,$id);
            $request->session()->put('Cart',$newCart);
          }


        //   if(Session::get('Cart')){
        //     foreach (Session('Cart') as  $value) {
        //         dd($value[78]);
        //     }
        //   }
        //   $product = Product::find($id);

        //   $product->quantity =

        return redirect()->back();
    }

    public function deleteCart($id){
        $oldCart = Session('Cart') ? Session::get('Cart') : null;
        $newCart = new Cart($oldCart);
        $newCart->removeItem($id);
        if(count($newCart->items) > 0){
            Session()->put('Cart', $newCart);
        }
        else{
            Session::forget('Cart');
        }
        return redirect()->back();
    }

    public function viewCart(){
        $type = Categories::all();
        return view('client.cart',compact('type'));
    }

    public function getCheckout(){
        $dataCategories = Categories::all();
        return view('client.check_out',compact('dataCategories'));
    }

    public function postCheckout(Request $request)
    {
        $cart = Session::get('Cart');
        $customer = new Customer;
        $customer->name = $request->name;
        $customer->gender = $request->gender;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->save();

        $Order = new Order;
        $Order->id_customer = $customer->id;
        $Order->date_order = date('Y-m-d');
        $Order->total = $cart->totalPrice;
        $Order->payment = $request->payment;
        $Order->note = $request->note;

        $Order->save();


        foreach($cart->items as $key => $value){
            $Order_detail = new Order_detail;
            $Order_detail->id_order = $Order->id;
            $Order_detail->id_product = $key;
            $Order_detail->quantity = $value['qty'];
            $Order_detail->price = $value['price'];
            $Order_detail->save();
        }
        Session::forget('Cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');


    }
}
