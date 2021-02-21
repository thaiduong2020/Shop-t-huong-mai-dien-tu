<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Product;
class ApiSearchController extends Controller
{

    public function search(Request $request){
            $product = Product::where('name', 'like', '%' . $request->val . '%')
        ->orWhere('price', 'like', '%' . $request->val . '%')->take(5)
        ->get();
        return response()->json($product);
    }
}
