<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    use HasFactory;
    protected $table='carrito';
    protected $fillable=[
        'id_users',
        'id_product',
        'precio_carrito',
        'cantidad_carrito'
    ];
    public $timestamps=false;
}
