<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\role_user;
use Illuminate\Support\Facades\Response;
class ApiUserController extends Controller
{
    private $user;
    private $roles;
    private $role_user;
    public function __construct(User $user, Role $roles,role_user $role_user ){
        $this->user = $user;
        $this->roles = $roles;
        $this->role_user = $role_user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->roles->all();
        $user = $this->user->paginate(20);
        $user2 = $this->user->all();

        return response()->json([
            'user' => $user,
            'roles'=> $roles,
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
            'name' => 'required',
            'email' => 'required|email|unique:Users,email',
            'password'=> 'required',
            'role_id' => 'required',
        ],[
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'email.required' => 'Bạn chưa nhập tên tài khoản',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
            'role_id.required'  => 'Bạn chưa chọn vai trò'
        ]);
        $user = new User;
        $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->role_id = $request->role_id;
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
        $user = $this->user->find($id);
        $roles = $this->roles->all();

        return response()->json([
            'user' => $user,
            'role' => $roles
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

        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'password'=> 'required',
            'role_id' => 'required',
        ],[
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'email.required' => 'Bạn chưa nhập tên tài khoản',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Mật khẩu không được để trống',
            'role_id.required'  => 'Bạn chưa chọn vai trò'
        ]);
        $user = $this->user->find($id);

            $user->name = $request->name;
            $user->email= $request->email;
            $user->password = bcrypt($request->password);
            $user->role_id = $request->role_id;
            $user->update();
            // $this->user->roles()->attach($request->role_id , $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::destroy($id);
    }
}
