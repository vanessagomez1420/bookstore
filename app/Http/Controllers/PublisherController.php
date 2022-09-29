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
     *
     * @param publisherRequest $request
     * @return \Illuminate\Http\JsonResponse
     */

    public function store(PublisherRequest $request)
    {
        $request->validate([
            'name'=> 'required|min:1',
            'address'=> 'required|min:1',
            'city'=> 'required|min:1',
            'site'=> 'required|min:1',
        ]);
        // $publisher = new Publisher($request->validated());
        // $publisher->save();

        $vane = Publisher::create([
            'name'=> $request->name,
            'address'=> $request->address,
            'city'=> $request->city,
            'site'=> $request->site,
        ]);


        return response()->json([
            'saved'=> true,
            'message' => 'Editorial creado con exito',
            'publisher' => $vane
        ]);
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
        $publisher->update($request->validated());
        return response()->json([
            'saved'=> true,
            'message' => 'Editorial actualizado con exito',
            'author' => $publisher
        ]);
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
