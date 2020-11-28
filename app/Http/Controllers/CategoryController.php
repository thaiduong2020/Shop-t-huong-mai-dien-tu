<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.categories.index');
    }
    public function role(){
        return view('admin.roles.index');
    }
}
