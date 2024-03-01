<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\Comic;

class ComicController extends Controller
{
    /*
        R - READ
    */
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comics = Comic::all();

        return view('comics.index', compact('comics'));
    }

    /**
     * Display the specified resource.
     */
    // Versione 1: con dependency injection
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    // Versione 2: con find e if per controllare se è stato trovato quello che cercavamo
    // public function show(string $id)
    // {
    //     $pasta = Pasta::find($id);

    //     if ($pasta == null) {
    //         // Vai in 404
    //         abort(404);
    //     }

    //     return view('pastas.show', compact('pasta'));
    // }

    // Versione 3: con findOrFail (che, nel caso in cui non trovasse niente che corrisponde a quella query, dà 404)
    // public function show(string $id)
    // {
    //     $pasta = Pasta::findOrFail($id);

    //     return view('pastas.show', compact('pasta'));
    // }
    /* -------------- FINE READ -------------- */


    /*
        C - CREATE
    */
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newSingleComicData = $request->all();

        $comic = new Comic();
        $comic->title = $newSingleComicData['title'];
        $comic->description = $newSingleComicData['description'];
        $comic->src = $newSingleComicData['thumb'];
        $comic->price = $newSingleComicData['price'];
        $comic->series = $newSingleComicData['series'];
        $comic->sale_date = $newSingleComicData['sale_date'];
        $comic->type = $newSingleComicData['type'];
        $comic->artists = implode(", ", $newSingleComicData['artists']);
        $comic->writers = implode(", ", $newSingleComicData['writers']);   
        $comic->save();

        return redirect()->route('comics.show', ['comic' => $comic->id]);
    }

    /* -------------- FINE CREATE -------------- */

    /*
        U - UPDATE
    */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /* -------------- FINE UPDATE -------------- */

    /*
        D - DELETE
    */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    /* -------------- FINE DELETE -------------- */
}
