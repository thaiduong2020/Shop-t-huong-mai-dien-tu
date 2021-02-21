<?php

namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Role;
// use App\Policies\CategoryPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $user = auth::user();
        if($user->can('view', Categories::class)){
            $role = Role::all();
            return view('admin.categories.index',compact('role'));
        }
        return view('admin.403');
    }
    public function role(){
        $user = auth::user();
        if($user->can('view', Role::class)){
            $role = Role::all();
            return view('admin.roles.index',compact('role'));
        }
        return view('admin.403');

    }
    public function user(){
        $user = auth::user();
        if($user->can('view', User::class)){
            $role = Role::all();
            return view('admin.users.index',compact('role'));
        }
        return view('admin.403');

    }
}
