<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreComicRequest;
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
    public function store(StoreComicRequest $request)
    {
        // VALIDATION = POSSO METTERLE ANCHE IN STORE_NOMEMODEL_REQUEST (request personalizzata,fatta cosi: php artisan make:request StoreComicRequest)
        //$validatedSingleComicResults = $request->validate([
            //'title' => 'required|string|max:64',
            //'description' => 'nullable|string|max:4000',
            //'src' => 'nullable|string|max:1024|min:1',
            //'comic-price' => 'required|max:50',
            //'comic-genre' => 'required|max:100|in:show,movie,documentary',
            //'sale_date' => 'required',
            //'type' => 'required|max:30',
            //'artists' => 'nullable',
            //'writers' => 'nullable',
            // le chiavi sono i name="" dei miei input
        //],[
            // 'title.required' => 'MESSAGGIO ERRORE CUSTUMED'
        //]
   //);

        // QUESTA $REQUEST->ALL() NON CI SERVE PI SE FACCIAMO LA VALIDAZIONE!
        // $validateeSingleComicResults = $request->all();

        //$comic = Comic::create($validatedSingleComicResults);
        $comic = Comic::create($request);

        // OPPURE 
        //$comic = new Comic();
                                        // è il name="" del mio input
        //$comic->title = $validatedSingleComicResults['title'];
        //$comic->description = $validatedSingleComicResults['description'];
        //$comic->src = $validatedSingleComicResults['src'];
        //$comic->price = $validatedSingleComicResults['comic-price'];
        //$comic->series = $validatedSingleComicResults['comic-genre'];
        //$comic->sale_date = $validatedSingleComicResults['sale_date'];
        //$comic->type = $validatedSingleComicResults['type'];
        //if($validatedSingleComicResults['artists'] !== null) {
        //    $comic->artists = implode(", ", $validatedSingleComicResults['artists']);
        //}
        //if($validatedSingleComicResults['artists'] !== null) {
        //    $comic->writers = implode(", ", $validatedSingleComicResults['writers']);
        //}
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
        $validatedSingleComicResults = $request->validate([
            // 'title' => 'required|string|max:64', <- se non voglio che il titolo non puo essere aggiornato
            'description' => 'nullable|string|max:4000',
            'src' => 'nullable|string|max:1024|min:1',
            'comic-price' => 'required|max:50',
            'comic-genre' => 'required|max:100|in:show,movie,documentary',
            'sale_date' => 'required',
            'type' => 'required|max:30',
            'artists' => 'nullable',
            'writers' => 'nullable',
            // le chiavi sono i name="" dei miei input
        ], [
            // 'title.required' => 'MESSAGGIO ERRORE CUSTUMED'
        ]);

        // QUESTA $REQUEST->ALL() NON CI SERVE PI SE FACCIAMO LA VALIDAZIONE!
        //$updatedComicData = $request->all(); 

        // PER SCRIVERE TUTTO IN UNA SOLA RIGA
        $comic->update($validatedSingleComicResults);

        // OPPURE
        // $comic = new Comic();
        // $comic->fill($updatedComicData);
        // $comic->save();

        // $comic = new Comic();
        //$comic->title = $updatedComicData['title'];
        //$comic->description = $updatedComicData['description'];
        //$comic->thumb = $updatedComicData['thumb'];
        //$comic->price = $updatedComicData['price'];
        //$comic->series = $updatedComicData['series'];
        //$comic->sale_date = $updatedComicData['sale_date'];
        //$comic->type = $updatedComicData['type'];
        //$comic->artists = implode(", ", $updatedComicData['artists']);
        //$comic->artists = implode(", ", $updatedComicData['writers']);

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
