<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    protected $fillable = [
        'firstName',
        'middleName',
        'lastName',
        'userName',
        'email',
        'password'
    ];
}
