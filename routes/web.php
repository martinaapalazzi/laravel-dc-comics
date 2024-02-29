<?php

use App\Http\Controllers\Admin\ComicController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('subpages.welcome');
});

Route::get('/chi-siamo', function () {
    return view('subpages.about');
});

/* CRUD Comic */
Route::resource('comics', ComicController::class);

// // R - READ
// Come in resource
// Route::get('/comics', [ComincController::class, 'index'])->name('comincs.index');
// Come in resource
// Route::get('/comics/{id}', [ComincController::class, 'show'])->name('comincs.show');

// // C - CREATE
// Come in resource
// Route::get('/comics/create', [ComincController::class, 'create'])->name('comincs.create');
// Route::post('/comics/add', [ComincController::class, 'store'])->name('comincs.store');

// // U - UPDATE
// Route::get('/comics/{id}/update', [ComincController::class, 'edit'])->name('comincs.edit');
// Route::put('/comics/{request}/{id}/update', [ComincController::class, 'update'])->name('comincs.update');

// // D - DELETE
// Route::delete('/comics/{id}/delete', [ComincController::class, 'destroy'])->name('comincs.destroy');
/* Fine CRUD Pasta */

// Route::get(PERCORSO CON CUI ARRIVARE ALLA PAGINA, FUNZIONE DI CALLBACK CHE MI CREA LA RISPOSTA DA DARE ALL UTENTE)
