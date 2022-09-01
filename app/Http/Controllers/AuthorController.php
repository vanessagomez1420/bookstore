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
     * @return \Illuminate\Contracts\foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\view
     */
    public function index()
    {
        $authors = Author::all();
        return view('author.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Nuevo';
        return view('author.new_edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
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
        return redirect()->route('author.index')->with('response', 'Autor creado con exito');
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
        $author->update($request->all());
        return redirect(route('author.index'))->with('respose', 'Autor actualizado con exito');
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
