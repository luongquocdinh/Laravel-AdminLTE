<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\User;
use App\Role;
class UserController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $datas = User::getInfoAllUser();
        return view("pages.user_list",['datas' => $datas]);
    }
    public function create()
    {
        $roles = Role::getlistRole();
        return view("pages.user_create",['roles' => $roles]);
    }
    public function store()
    {
        $data = Input::all();
        $data['roles'] = isset($data['roles'])? $data['roles']:[]   ;
        if(User::insertUser($data))
        {
            $user = User::findUserByUsername($data['name']);
            $user->attachRoles($data['roles']);
            return redirect("user");
        }
    }
    public function edit($id)
    {
        $data = User::findUser($id);
        $roles = Role::getlistRole();
        $listrole = User::find( $id )->roles()->get();
        $list = array();
        foreach($listrole as $i){
            array_push($list, $i->name);
        }
        return view("pages.user_edit",['data' => $data, 'roles' => $roles, 'roles_user' => $list]);
    }
    public function update($id)
    {
        $data = Input::all();
        $cur_user = User::findUser($id);
        if(strlen($data['password'])==0)
            $data['password'] =$cur_user['password']   ;
        else
            $data['password']=bcrypt($data['password']);
        $data['roles'] = isset($data['roles'])? $data['roles']:[]   ;
        if(User::updateUser($id,$data)) {
            $user = User::findUser($id);
            $user->detachRoles($user->roles);
            $user->attachRoles($data['roles']);
            return redirect("user");
        }
    }
}
