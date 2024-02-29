<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models 
use App\Models\Comic;
class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comicsData = config('comics'); 

        foreach ($comicsData as $index => $singleComicData) {

            $comic = new Comic();

            $comic->title = $singleComicData['title'];
            $comic->description = $singleComicData['description'];
            $comic->thumb = $singleComicData['src'];
            $comic->price = $singleComicData['price'];
            $comic->series = $singleComicData['series'];
            $comic->saleDate = $singleComicData['sale_date'];
            $comic->type = $singleComicData['type'];

            $comic->save();

            //$comic->artists = $singleComicData['artists'];
            //$comic->writers = $singleComicData['writers'];
        }
    }
}
