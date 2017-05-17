<?php namespace App;

use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $fillable = [
        'name', 'display_name', 'description'
    ];
    static function getlistPermission()
    {
        return self::All();
//        return self::simplePaginate(10);
    }
    static function insertPermission($data)
    {
        return self::create([
            'name' => $data['name'],
            'display_name' => $data['display_name'],
            'description' => $data['description'],

        ]);
    }
    static function findPermission($id)
    {
        $role =  self::where("id", $id)->first();
        return $role;
    }
    static function updatePermission($id, $data)
    {
        $data_update = [
            'name' => $data['name'],
            'display_name' => $data['display_name'],
            'description' => $data['description'],

        ];
        return self::where("id", $id)->update($data_update);
    }
}