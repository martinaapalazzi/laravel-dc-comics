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
                                        // è il name="" del mio input
        $comic->title = $newSingleComicData['title'];
        $comic->description = $newSingleComicData['description'];
        $comic->src = $newSingleComicData['src'];
        $comic->price = $newSingleComicData['comic-price'];
        $comic->series = $newSingleComicData['comic-genre'];
        $comic->sale_date = $newSingleComicData['sale_date'];
        $comic->type = $newSingleComicData['type'];
        if($newSingleComicData['artists'] !== null) {
            $comic->artists = implode(", ", $newSingleComicData['artists']);
        }
        if($newSingleComicData['artists'] !== null) {
            $comic->writers = implode(", ", $newSingleComicData['writers']);
        }
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
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comic $comic)
    {
        // VALIDATION
        $validationSingleComicResults = $request->validate([
            'title' => 'required|max:64',
            'description' => 'nullable|max:4000',
            'src' => 'nullable|max:1024|min:1',
            'price' => 'required|max:50',
            'series' => 'required|max:100|in:show,movie,documentary',
            'sale_date' => 'required',
            'type' => 'required|max:30',
            'artists' => 'nullable',
            'writers' => 'nullable',
        ]);

        // QUESTA $REQUEST->ALL() NON CI SERVE PI SE FACCIAMO LA VALIDAZIONE!
        // $validationSingleComicResults = $request->all(); 

        // PER SCRIVERE TUTTO IN UNA SOLA RIGA
        $comic->update($validationSingleComicResults);

        // OPPURE
        // $comic->fill($validationSingleComicResults);
        // $comic->save();

        //$comic->title = $validationSingleComicResults['title'];
        //$comic->description = $validationSingleComicResults['description'];
        //$comic->thumb = $validationSingleComicResults['thumb'];
        //$comic->price = $validationSingleComicResults['price'];
        //$comic->series = $validationSingleComicResults['series'];
        //$comic->sale_date = $validationSingleComicResults['sale_date'];
        //$comic->type = $validationSingleComicResults['type'];
        //$comic->artists = implode(", ", $validationSingleComicResults['artists']);
        //$comic->artists = implode(", ", $validationSingleComicResults['writers']);

        $comic->save();
        return redirect()->route('comics.show', ['comic'=>$comic->id]);

    }

    /* -------------- FINE UPDATE -------------- */

    /*
        D - DELETE
    */
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();

        return redirect()->route('comics.index');
    }
    /* -------------- FINE DELETE -------------- */
}
