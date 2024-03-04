@extends('layouts.app')

@section('page-title', $comic->title)

@section('main-content')
<h1>
    {{ $comic->title }}
</h1>

<div class="row">
    <div class="col">

        <div class="card">
            <div class="poster-container pt-3">
                @if ($comic->src)
                    <img src="{{ $comic->src }}" alt="{{ $comic->title }}" class="card-img-top">
                @endif
            <div class="card-body">
                <ul class="list-style">
                    <li class="pb-3">
                        <h5>Story:</h5>
                        {{ $comic->description }}
                    </li>
                    <li class="pb-3">
                        <h5>Artists:</h5>
                        {{ $comic->artists }}
                    </li>
                    <li class="pb-3">
                        <h5>Writers:</h5>
                        {{ $comic->writers }}
                    </li>
                    <li class="pb-3">
                        <h5>Price:</h5>
                        {{ $comic->price }}
                    </li>
                    <li class="pb-3">
                        <h5>Genre:</h5>
                        {{ $comic->series }}
                    </li>
                    <li class="pb-3">
                        <h5>Release date:</h5>
                        {{ $comic->sale_date }}
                    </li>
                </ul>
            </div>
        </div>
        <div class="mt-4">
            <a href="{{ route('comics.index') }}" class="btn btn-primary">
                Go back to Comic Home Page!
            </a>
        </div>

    </div>
</div>
@endsection