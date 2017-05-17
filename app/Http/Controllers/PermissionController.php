<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Permission;
class PermissionController extends Controller
{
    //
    public function index()
    {
        $datas = Permission::getListPermission();
        return view("pages.permission_list",['datas' => $datas]);
    }
    public function create()
    {
        return view("pages.permission_create");
    }
    public function store()
    {
        $data = Input::all();

        if(Permission::insertPermission($data))
            return redirect("permission");
    }
    public function edit($id)
    {
        $data = Permission::findPermission($id);
        return view("pages.permission_edit",['data' => $data]);
    }
    public function update($id)
    {
        $data = Input::all();

        if(Permission::updatePermission($id,$data)) {
            return redirect("permission");
        }
    }
}
