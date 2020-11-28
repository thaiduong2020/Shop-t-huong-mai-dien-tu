<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Response;
class ApiProducts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        
        $data = Product::paginate(4);
        $data1 = Product::orderby('id','asc')->where('id_category', 84 )->paginate(4);
        $data2 = Product::orderby('id','asc')->where('id_category', 92 )->paginate(4);
        $data3 = Product::orderby('id','asc')->where('id_category', 103 )->paginate(4);
        $data4 = Product::orderby('id','asc')->where('id_category', 86 )->paginate(2);
        $data5 = Product::orderby('id','desc')->where('id_category', 103 )->paginate(2);
        $data6 = Product::orderby('id','desc')->where('id_category', 98 )->paginate(2);
        $dataImage = ProductImage::orderby('id','desc')->take(1)->get();
        // $data2 = Product::where('id_category', 57 )->orderBy('id', 'asc')->paginate(4);
        return response()->json([
            'data' => $data,
            'data1' => $data1,
            'data2' => $data2,
            'data3' => $data3,
            'data4' => $data4,
            'data5' => $data5,
            'data6' => $data6,
            'image' => $dataImage,
            // 'data2' =>$data2
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
        $this->validate($request,[
            'name' => 'required|unique:Products,name|min:6',
            'price' => 'required',
            'image' => 'required',
            'quantity' => 'required',
            'description' => 'required|min:6'
        ],[
            'name.required' => 'Vui lòng nhập tên sản phẩm!',
            'name.min'          => "Tên sản phẩm phải lớn hơn 6 ký tự!",
            'name.unique'          => "Tên sản phẩm tồn tại!",
            'price.required' => 'Vui lòng nhập tên sản phẩm!',
            'image.required' => 'Vui lòng nhập tên sản phẩm!',
            'quantity.required' => 'Vui lòng nhập tên sản phẩm!',
            'description.required' => 'Vui lòng nhập tên sản phẩm!',
            'description.min'          => "Mô tả sản phẩm quá ngắn, phải lớn hơn 6 ký tự!",
            
            ]
    );

        $products = new Product;
            $products->id_category = $request->id_category;
            $products->id_brand    = $request->id_brand;
            $products->name        = $request->name;	
            $products->price       = $request->price;
            $products->description = $request->description;	
            $products->quantity    = $request->quantity;
            
        if($request->image){
            $imageName = time().'_'.uniqid().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('storage/image/'),$imageName);
            $products->image = 'storage/image/'.$imageName;
            $products->save();
        }

        if($request->imageproduct){
           foreach($request->imageproduct as $fileItem){
            $imageName = time().'_'.uniqid().'.'.$fileItem->getClientOriginalExtension();
            $fileItem->move(public_path('storage/image/'),$imageName);
            $name = 'storage/image/'.$imageName;
            $id_product = $products->id;
            $productsimg = ProductImage::create([
                'id_product' => $id_product,
                'name'   => $name
            ]);
           }
          

        }

        return response()->json([
            'product' => $products,
            'image' => $productsimg
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Product::find($id);
        return response()->json($data);
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
            $this->validate($request,[
            'name' => 'required|min:6',
            'price' => 'required',
            'image' => 'required',
            'quantity' => 'required',
            'description' => 'required|min:6'
        ],[
            'name.required' => 'Vui lòng nhập tên sản phẩm!',
            'name.min'          => "Tên sản phẩm phải lớn hơn 6 ký tự!",
            'price.required' => 'Vui lòng nhập tên sản phẩm!',
            'image.required' => 'Vui lòng nhập tên sản phẩm!',
            'quantity.required' => 'Vui lòng nhập tên sản phẩm!',
            'description.required' => 'Vui lòng nhập tên sản phẩm!',
            'description.min'          => "Mô tả sản phẩm quá ngắn, phải lớn hơn 6 ký tự!",
            
            ]
    );
        $products = Product::find($id);
            $products->name = $request->name;
            $products->price = $request->price;
            $products->quantity = $request->quantity;
            $products->description = $request->description;
            $products->id_category = $request->id_category;
            $products->id_brand = $request->id_brand;
            

        // $products = Product::updateOrCreate(
        //     [
        //         'id' => $id
        //     ],[
        //         'id_category' => $request->id_category,	
        //         'name'        => $request->name,	
        //         'price'       => $request->price,
        //         'description' => $request->description,	
        //         'quantity'    => $request->quantity,
        //     ]);
        // if ($request->file('image')->isValid()) {
        //     $file = $request->file('image') ;
        //     $fileName = $file->getClientOriginalName() ;
        //     $destinationPath = 'storage/image/' ;
        //     $file->move($destinationPath,$fileName);
        //     $products->image = $fileName;
        // }
        $products->update();
        return response()->json($products);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::destroy($id);

        return response()->json($data);
    }
}
