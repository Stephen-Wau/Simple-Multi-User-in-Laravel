<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = "admins";

    protected $primaryKey = "id";

    protected $fillable = [
        'name','role','email','password','token','expired','status'
    ];
}
