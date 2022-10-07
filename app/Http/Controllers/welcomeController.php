<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use App\Models\Author;
use App\Models\Publisher;



class welcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cardWelcome()
    {
        $books = Book::with('author','publisher', 'genre')->get();
        return view('welcome', ['books_news' => $books]);

    }


}
