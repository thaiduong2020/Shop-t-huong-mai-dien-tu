<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function login(Request $request){

        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ],
        [
            'email.required' => 'Email không được để trống !',
            'password.required' => 'mật khẩu không được để trống !'
        ]);
        $user = User::all();
        $cr = $request->only('email', 'password');

        if (Auth::attempt($cr)) {
            // Authentication passed...
            $request->session()->put('user_id',Auth::user()->id);
            $request->session()->put('user_name',Auth::user()->name);
            return redirect('/trang-chu'); //
        }
        return back()->with('check','Tài khoản hoặc mật khẩu không chính xác !');



    }

    public function register(Request $request){
        // dd(123);
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
        return back()->with('success','Đăng ký tài khoản thành công !');
    }
    public function logout(){
        if(Auth::logout()){
            return redirect('/trang-chu');
        }
        return back();
    }
}
