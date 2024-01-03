<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Food extends Model
{

    protected $table = "foods";

    protected $primaryKey = "id";

    protected $fillable = [
        'harga','name','image'
    ];

}
