<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LoginController extends Controller
{
    public function login(Request $request){
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            $request->session()->put('user_id',Auth::user()->id);
            $request->session()->put('user_name',Auth::user()->name);
            return redirect()->route('home');
        }
            


    }
    public function logout(){
        if(Auth::logout()){
            return redirect('/trang-chu');
        }
        return redirect('/trang-chu');
    }
}
