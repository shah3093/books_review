<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

    const USER_TYPE = [
        0 => 'User',
        1 => 'Moderator',
        2 => 'Super Admin',
    ];

    const USER_STATUS = [
        1 => 'Active',
        0 => 'Inactive'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAll()
    {
        return User::get();
    }


    public function storeData($data)
    {
        $user = new User();

        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->password = $data['password'];
        $user->status = $data['status'];
        $user->user_type = $data['user_type'];
        $user->address = $data['address'];
        $user->details = $data['details'];

        $user->save();

        return $user;
    }

    public function updateData($id,$data)
    {
        $statusCode = 100;

        $user = User::find($id);

        if(!empty($user)){
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->phone = $data['phone'];
            $user->status = $data['status'];
            $user->user_type = $data['user_type'];
            $user->address = $data['address'];
            $user->details = $data['details'];

            $user->save();
        }else{
            $statusCode = 2;
        }

        return $statusCode;
    }

    public function deleteData($id){
        $statusCode = 100;

        $user = User::find($id);

        if(Auth::user()->id == $id){
            $statusCode = 3;
        }else if(!empty($user) && $statusCode == 100){
            User::where('id',$id)->delete();
        }else{
            $statusCode = 2;
        }

        return $statusCode;
    }
}
