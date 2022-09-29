<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'pages',
        'language',
        'publication_date',
        'price',
        'image',
    ];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'author_has_books');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'book_has_genres');
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}
