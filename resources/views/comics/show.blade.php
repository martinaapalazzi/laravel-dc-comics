@extends('layouts.app')

@section('page-title', $comic->title)

@section('main-content')
<h1>
    {{ $comic->title }}
</h1>

<div class="row">
    <div class="col">
        <div class="mb-4">
            <a href="{{ route('comics.index') }}" class="btn btn-primary">
                Go back to Comic Home Page!
            </a>
        </div>

        <div class="card">
            <img src="{{ $comic->src }}" alt="{{ $comic->title }}" class="card-img-top">

            <div class="card-body">
                <ul>
                    <li>
                        {{ $comic->description }}
                    </li>
                    <li>
                        Artists: {{ $comic->artists }}
                    </li>
                    <li>
                        Writers: {{ $comic->writers }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection