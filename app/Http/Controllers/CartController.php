<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\User;
class CartController extends Controller
{
    public function addCart(Request $request,$id){
        $type = Categories::all();
        $product = Product::find($id);
            $oldCart = Session('Cart') ? Session::get('Cart') : null;
            $newCart = new Cart($oldCart);
            $newCart->Add($product,$id);
            $request->session()->put('Cart',$newCart);
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
        $type = Categories::all();
        return view('client.check_out',compact('type'));
    }

    public function postCheckout(Request $request)
    {
        $cart = Session::get('Cart');
        $User = new User;
        $User->name = $request->name;
        $User->gender = $request->gender;
        $User->email = $request->email;
        $User->address = $request->address;
        $User->phone = $request->phone;
        $User->save();

        $Order = new Order;
        $Order->id_customer = $customer->id;
        $Order->date_order = date('Y-m-d');
        $Order->total = $cart->totalPrice;
        $Order->payment = $request->payment;
        $Order->note = $request->note;

        $Order->save();


        foreach($cart->items as $key => $value){
            $bill_detail = new Bill_detail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_products = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->price = $value['price'];
            $bill_detail->save();
        }
        Session::forget('Cart');
        return redirect()->back()->with('thongbao','Đặt hàng thành công');


    }
}
