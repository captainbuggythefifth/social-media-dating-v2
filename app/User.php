<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    const GENDER_TYPE_MALE = 1; //MALE
    const GENDER_TYPE_FEMALE = 2;
    const GENDER_TYPE_IN_BETWEEN = 3;


    protected $fillable = [
        'name', 'email', 'password', 'age', 'birth_date', 'gender'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
