<?php namespace App;

use Zizaco\Entrust\EntrustRole;
use App\User;
class Role extends EntrustRole
{
    protected $fillable = [
        'name', 'display_name', 'description'
    ];
    static function getlistRole()
    {
        return self::All();
//        return self::simplePaginate(10);
    }
    static function insertRole($data)
    {
        return self::create([
            'name' => $data['name'],
            'display_name' => $data['display_name'],
            'description' => $data['description'],

        ]);
    }
    static function findRole($id)
    {
        $role =  self::where("id", $id)->first();
        return $role;
    }
    static function updateRole($id, $data)
    {
        $data_update = [
            'name' => $data['name'],
            'display_name' => $data['display_name'],
            'description' => $data['description'],

        ];
        return self::where("id", $id)->update($data_update);
    }

}