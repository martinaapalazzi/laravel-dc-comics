<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comics', function (Blueprint $table) {
            $table->id();

            // TITLE string 64 NOT NULL
            $table->string('title');

            // DESCRIPTION text NULL
            $table->text('description')->nullable();

            // THUMB string 1024 NULL
            $table->string('src', 1024)->nullable();

            // PRICE string 50 NOT NULL
            $table->string('price', 50);

            // SERIES string 100 NOT NULL
            $table->string('series', 100);

            // SALE_DATE date NOT NULL
            $table->date('sale_date');

            // TYPE string 30 NOT NULL
            $table->string('type', 30);

            // ARTISTS string 64 NULL
            $table->text('artists')->nullable();
            
            // WRITERS string 64 NULL
            $table->text('writers')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comics');
    }
};
