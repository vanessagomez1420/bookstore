<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\AuthorHasBook;
use App\Models\Book;
use App\Models\BookHasGenre;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Models\Publisher;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all()->load('authors')->load('genres');
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Nuevo';
        $publishers = Publisher::all();
        $authors = Author::all();
        $genres = Genre::all();
        return view('book.new_edit', compact('title', 'publishers', 'authors', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($request->hasFile('image')) {
            $image_name = uniqid() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images/books', $image_name);
            $requestArray = $request->all();
            $requestArray['image'] = $image_name;

        }


        $book = new Book($requestArray);
        $book->save();
        if ($request->authors) {
            foreach ($request->authors as $author) {
                $bookAuthor = new AuthorHasBook();
                $bookAuthor->author_id = $author;
                $bookAuthor->book_id = $book->id;
                $bookAuthor->save();
            }
        }
        if ($request->genres) {
            foreach ($request->genres as $genre) {
                $bookGenre = new BookHasGenre();
                $bookGenre->genre_id = $genre;
                $bookGenre->book_id = $book->id;
                $bookGenre->save();
            }
        }

        return redirect()->route('book.index')->with('response', 'libro creado con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $title = 'Editar';
        $publishers = Publisher::all();
        $authors = Author::all();
        $genres = Genre::all();
        return view('book.new_edit', compact('title', 'book', 'publishers', 'authors', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        if ($request->hasFile('image')) {
            $image_name = uniqid() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images/books', $image_name);
            $requestArray = $request->all();
            $requestArray['image'] = $image_name;
        }



        $book->update($requestArray);
        AuthorHasBook::where('book_id', $book->id)->delete();
        if ($request->authors) {
            foreach ($request->authors as $author) {
                $bookAuthor = new AuthorHasBook();
                $bookAuthor->author_id = $author;
                $bookAuthor->book_id = $book->id;
                $bookAuthor->save();
            }
        }
        BookHasGenre::where('book_id', $book->id)->delete();
        if ($request->genres) {
            foreach ($request->genres as $genre) {
                $bookGenre = new BookHasGenre();
                $bookGenre->genre_id = $genre;
                $bookGenre->book_id = $book->id;
                $bookGenre->save();
            }
        }

        return redirect()->route('book.index')->with('response', 'libro actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        try {
            $genres = DB::table('book_has_genres')->where('book_id', $book->id)->delete();
            $authors = DB::table('author_has_books')->where('book_id', $book->id)->delete();
            $book->delete();
            return response()->json(['deleted' => true, 'message' => 'Libro borrado con exito!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
