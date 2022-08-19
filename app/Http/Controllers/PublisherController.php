<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublisherRequest;
use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishers = Publisher::all();
        return view('publisher.index', compact('publishers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Nuevo';
        return view('publisher.new_edit', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublisherRequest $request)
    {
        // creamos objeto con las informacion que llega en request
        $publisher = new Publisher($request->all());
        // Usamos el metodo sve para almacenar el objeto en la base de datos
        $publisher->save();
        // retornamos al index de editoriales con el mensaje de exito
        return redirect(route('publisher.index'))->with('response', 'Editorial creada corecrtamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function edit(Publisher $publisher)
    {
        $title = 'Editar';
        return view('publisher.new_edit', compact('publisher', 'title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(PublisherRequest $request, Publisher $publisher)
    {
        if ($request->hasFile('image')) {
            $image_name = uniqid() . '_' . $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images/publishers', $image_name);
            $request = $request->all();
            $request['image'] = $image_name;
        }

        $publisher->update($request->all());
        return redirect(route('publisher.index'))->with('response', 'Editorial actualizada correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publisher  $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        try {
            $books = DB::table('books')->select('*')->where('publisher', $publisher->id)->get();
            if ($books->isEmpty()) {
                $publisher->delete();
                return response()->json(['deleted' => true, 'error' => 'Editorial borrada correctamente'], 200);
            } else {
                return response()->json(['deleted' => false, 'menssage' => 'No se puede borrar , la editorial tiene libre asociados'], 200);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage(), 200]);
        }
    }
}
