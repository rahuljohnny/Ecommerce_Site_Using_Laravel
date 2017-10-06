<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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

    public function isAdmin()
    {
        return $this->admin;
    }

    public function address()
    {
        //return $this->hasMany('App\Product');  It can be written as-
        return $this->hasMany(Address::class); //ctrl + click on the class to access the class
    }

    public function orders()
    {
        //return $this->hasMany('App\Product');  It can be written as-
        return $this->hasMany(Order::class); //ctrl + click on the class to access the class
    }

}
