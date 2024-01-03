<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = "admins";

    protected $primaryKey = "id";

    protected $fillable = [
        'name','role','email','password','status'
    ];

    protected $hidden = [
        'password', 'token',
    ];
}

