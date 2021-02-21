<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order_detail;
use App\Models\Order;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Facades\Response;
class ApiBillController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order_detail =  Order_detail::all();
        $order =  Order::all();
        $customer =  Customer::all();

        return response()->json([
            'order_detail' => $order_detail,
            'order'=> $order,
            'customer'=> $customer,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order=  Order::find($id);
        $order_detail =  Order_detail::all();
        $customer =  Customer::all();
        $product = Product::all();
        return response()->json([
            'order_detail' => $order_detail,
            'order'=> $order,
            'customer'=> $customer,
            'product'=> $product,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Order::find($id);
        $data->status = $request->status;

        $data->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Order_detail::destroy($id);
        return $data;
    }
}
