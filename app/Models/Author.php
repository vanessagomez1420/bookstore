<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'sur_name',
        'last_name',
        'citizenship',
        'date_of_birth',
        'bio',
        'image',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class, 'author_has_books');
    }
}
