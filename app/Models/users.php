<?php
namespace App\Models;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Factories\HasFactory;




class users extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'tipo_usuario'
    ];


}
