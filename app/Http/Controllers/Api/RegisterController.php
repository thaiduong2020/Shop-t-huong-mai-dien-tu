<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'phone' => 'required|min:10|max:10',
            'address' => 'required',
        ],[
            'name.required' => 'Vui lòng nhập tên !',
            'name.min' => 'tên không được nhỏ hơn 6 ký tự !',
            'email.required' => 'Vui lòng nhập email !',
            'email.email' => 'email không đúng định dạng !',
            'password.required' => 'Vui lòng nhập mật khẩu !',
            'password.required' => 'mật khẩu không được nhỏ hơn 6 ký tự !',
            'phone.required' => 'Vui lòng nhập tên !',
            'phone.min' => 'số điện thoại phải lớn hơn 10 ký tự !',
            'phone.max' => 'số điện thoại phải nhỏ hơn 11 ký tự !',
            'address.required' => 'Vui lòng nhập tên !',
        ]);
        $user = new User;
        $user->name = $request->name; // dữ liệu của trường name
        $user->email = $request->email; // dữ liệu của trương email
        $user->password = bcrypt($request->password);
        $user->phone = $request->phone;
        $user->address = $request->name;
        $user->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
