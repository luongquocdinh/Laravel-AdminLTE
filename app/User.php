<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use App\Role_User;
class User extends Authenticatable
{
    use Notifiable;
    use EntrustUserTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','is_block','api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    static function getInfoAllUser()
    {
        return self::All();
//        return self::simplePaginate(10);
    }
    static function insertUser($data)
    {
        return self::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'is_block' => false,
            'api_token' => str_random(60)
        ]);
    }
    static function findUser($id)
    {
        $user =  self::where("id", $id)->first();
        return $user;
    }
    static function findUserByUsername($name)
    {
        $user =  self::where("name", $name)->first();
        return $user;
    }
    static function updateUser($id, $data)
    {
        $data_update = [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'is_block' => false,
            'api_token' => str_random(60)
        ];
        return self::where("id", $id)->update($data_update);
    }
    static function checkRole($id, $role)
    {
        $user = self::findUser($id);
        return $user->hasRole($role);
    }
}
