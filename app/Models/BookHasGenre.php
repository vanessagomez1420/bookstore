<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookHasGenre extends Model
{
    use HasFactory;

    protected $fillable = [
        'genre_id',
        'book_id',
    ];
}
