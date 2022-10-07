<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenreRequest;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $genres = Genre::all();
        return view('genre.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Nuevo';
        return view('genre.new_edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     *@param GenreRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(GenreRequest $request)
    {
        $genre = new Genre($request->validated());
        $genre->save();


        return response()->json([
            'saved'=> true,
            'message' => 'Genero creado con exito',
            'genre' => $genre
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function show(Genre $genre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function edit(Genre $genre)
    {
        $title = 'Editar';
        return view('genre.new_edit', compact('genre', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function update(GenreRequest $request, Genre $genre)
    {
        $genre->update($request->validated());
        return response()->json([
            'saved'=> true,
            'message' => 'Genero actualizado con exito',
            'genre' => $genre
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Genre  $genre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Genre $genre)
    {
        try {
            $books = DB::table('book_has_genres')->where('genre_id', $genre->id)->delete();
            $genre->delete();
            return response()->json(['deleted' => true, 'message' => 'Genero borrado con exito!'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
