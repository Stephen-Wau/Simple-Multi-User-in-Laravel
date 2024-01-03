<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
 
    protected $table = "barangs";

    protected $primaryKey = "id";

    protected $fillable = [
        'harga','name','image'
    ];

}
