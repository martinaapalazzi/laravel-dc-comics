@extends('layouts.app')

@section('page-title', $comic->title)

@section('main-content')
<h1>
    {{ $pasta->title }}
</h1>

<div class="row">
    <div class="col">
        <div class="mb-4">
            <a href="{{ route('comics.index') }}" class="btn btn-primary">
                Go back to Comic Home Page!
            </a>
        </div>

        <div class="card">
            <img src="{{ $pasta->src }}" alt="{{ $pasta->title }}" class="card-img-top">

            <div class="card-body">
                <ul>
                    <li>
                        Tipo: {{ $pasta->type }}
                    </li>
                    @if ($pasta->cooking_time)
                        <li>
                            Tempo di cottura: {{ $pasta->cooking_time }} min.
                        </li>
                    @endif
                    <li>
                        Peso: {{ $pasta->weight }}g
                    </li>
                </ul>

                <p>
                    {{ $pasta->description }}
                </p>
            </div>
        </div>
    </div>
</div>
@endsection