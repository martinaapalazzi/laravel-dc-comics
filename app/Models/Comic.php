<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comic extends Model
{
    use HasFactory;

    // I campi che sono mass assignable sono: src, title, type... (colonne abilitate al mass assignment) SONOO I NOMI DEL DB
    protected $fillable = [
        'title',
        'description',
        'src',
        'price',
        'series',
        'sale_date',
        'type',
        'artists',
        'writers'
    ];

    // OPPURE tutti i campi che non voglio includere 
    // protected $guarded = [ ]
}
