<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'title',
        'pages',
        'language',
        'publication_date',
        'price',
        'image',
        'publisher_id',
        'author_id',
        'genre_id'
    ];

    public function author()
    {
        return $this->hasOne(Author::class,'id','author_id');
    }

     public function genre()
    {
        return $this->hasOne(Genre::class,'id','genre_id');
    }

    public function publisher()
     {
        return $this->hasOne(Publisher::class,'id','publisher_id');
    }
}
