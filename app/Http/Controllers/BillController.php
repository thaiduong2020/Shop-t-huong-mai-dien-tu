<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\Order_detail;
class BillController extends Controller
{
    public function getList(){

        $bill = Order_detail::paginate(6);
        return view('admin.bill.list-bill',compact('bill'));
    }
    public function postDelete($id){
        $bill = Order_detail::find($id);
        $bill->delete();
        return redirect()->back()->with('thongbao','Xóa đơn hàng thành công') ;
    }
}
