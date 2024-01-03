<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SuperAdmin extends Authenticatable
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
