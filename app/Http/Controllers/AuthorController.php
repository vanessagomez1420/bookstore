<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return view('author.index', compact('authors'));
    }

    /**
     * @param AuthorRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(AuthorRequest $request)
    {
        if ($request->hasFile('image')) {
            $image_name = uniqid() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images/authors', $image_name);
            $request = $request->all();
            $request['image'] = $image_name;
        }
        $author = new Author($request->validated());
        $author->save();
    

        return response()->json([
            'saved'=> true,
            'message' => 'Autor creado con exito',
            'author' => $author
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Author $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Author $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        $title = 'Editar';
        return view('author.new_edit', compact('author', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Author $author
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorRequest $request, Author $author)
    {
        if ($request->hasFile('image')) {
            $image_name = uniqid() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images/authors', $image_name);
            $request = $request->all();
            $request['image'] = $image_name;
        }
        $author->update($request->validated());
        return response()->json([
            'saved'=> true,
            'message' => 'Autor actualizado con exito',
            'author' => $author
        ]);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Author $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        try {
            $books = DB::table('author_has_books')->select('*')->where('author_id', $author->id)->get();
            if ($books->isEmpty()) {
                $author->delete();
                return response()->json(['deleted' => true, 'message' => 'El autor ha sido eliminado!'], 200);
            } else {
                return response()->json(['deleted' => false, 'message' => 'El autor no se puede borrar ya que tiene libros asociados'], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['error', $e->getMessage()], 200);
        }
    }
}
