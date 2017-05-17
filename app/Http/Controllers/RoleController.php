<?php

namespace App\Http\Controllers;
use App\Permission;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Role;
class RoleController extends Controller
{
    //
    public function index()
    {
        $datas = Role::getListRole();
        return view("pages.role_list",['datas' => $datas]);
    }
    public function create()
    {
        return view("pages.role_create");
    }
    public function store()
    {
        $data = Input::all();

        if(Role::insertRole($data))
            return redirect("role");
    }
    public function edit($id)
    {
        $data = Role::findRole($id);
        $permission = Permission::getlistPermission();
        $listperms = Role::find( $id )->perms()->get();
        $list = array();
        foreach($listperms as $i){
            array_push($list, $i->name);
        }

        return view("pages.role_edit",['data' => $data, 'permissions' => $permission, 'perms_role' =>$list]);
    }
    public function update($id)
    {
        $data = Input::all();

        if(Role::updateRole($id,$data)) {
            $role = Role::findRole($id);
            $role->detachPermissions($role->perms);
            $role->attachPermissions($data['permissions']);
            return redirect("role");
        }
    }
}
