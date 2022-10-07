<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\Author;
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
        $books = Book::with('author','publisher', 'genre')->get();
        return view('book.index', compact('books'));

    }

     public function getData(){
        $genres = Genre::all();
        $publishers = Publisher::all();
        $authors = Author::all();

        return response()->json([
            'genres'=>$genres,
            'publishers'=>$publishers,
            'authors'=>$authors,
        ]);
    }


    /**
     * @param BookRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required|min:1',
            'pages'=> 'required|min:1',
            'language'=> 'required|min:1',
            'publication_date'=> 'required|min:1',
            'price'=> 'required|min:1',
        ]);

        if ($request->hasFile('image')) {
            $imageName = \Str::random(5). '.' . $request->image->getClientOriginalExtension();
            request()->image->move(public_path('/images/books'), $imageName);

        }

        $book = new Book($request->all());
        $book->image = '/images/books/'.$imageName;
        $book->save();

        return response()->json([
            'saved'=> true,
            'message' => 'Libro creado con exito',
            'book' => $book->load('genre', 'author','publisher')
        ]);
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
        return view('book.new_edit', compact('book', 'title'));
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
        dd($request);
        if ($request->hasFile('image')) {
            $imageName = \Str::random(5). '.' . $request->image->getClientOriginalExtension();
            request()->image->move(public_path('/images/books'), $imageName);
        }
        $request->image='/images/books'.$imageName;
        $book->update($request->all());

        return response()->json([
            'saved'=> true,
            'message' => 'libro actualizado con exito',
            'book' => $book->load('genre', 'author','publisher')
        ]);
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
