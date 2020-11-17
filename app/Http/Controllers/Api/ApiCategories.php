<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Illuminate\Support\Facades\Response;

class ApiCategories extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        try {
            $product = categories::all();
            // dd($product);
            return response()->json($product);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'code'   => Response::HTTP_INTERNAL_SERVER_ERROR,
                'message'=> $e->getMessage(),
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request,[
                'name' => 'required'
            ],[
                'name.required' => 'vui lòng nhập tên danh mục!',
            ]
        );
        $data =  new Categories;
        $data->name = $request->name;
        if($request->parent_id == null){
            $data->parent_id = 0;
        }else{
            $data->parent_id = $request->parent_id;
        }
             
        $data->save();
        return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json($th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        try {
            $data = Categories::find($id);
            return response()->json($data);
        }   catch (\Throwable $th) {
            return response()->json($th);
        }
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
       try {
    
        $validatedData = $request->validate([
            'name' => 'required',
        ],[
            'name.required' => 'Vui lòng nhập tên danh mục!',
        ]);
                $data = Categories::find($id);
                $data->name = $request->name;
                if($request->parent_id == null){
                    $data->parent_id = 0;
                }else{
                    $data->parent_id = $request->parent_id;
                }
                $data->save();
                return response()->json($validatedData);
       } catch (\Throwable $th) {
        return response()->json($th);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    try {
        $data = Categories::destroy($id);
        return response()->json($data);
    } catch (\Throwable $th) {
        return response()->json($th);

    }        
    }
}
