@extends('layouts.app')

@section('page-title', 'Comics')

@section('main-content')

<h1>
    Comics Index
</h1>

<div class="row">
    <div class="col">
        <div class="mb-4">
            <a href="{{ route('comics.create') }}" class="btn btn-success w-100 fs-5">
                + add a new comic!
            </a>
        </div>

        <table class="table">
            <thead>
                <tr class="text-center">
                    <th scope="col">#</th>
                    <th scope="col">Poster:</th>
                    <th scope="col">Title:</th>
                    <th scope="col">Price:</th>
                    <th scope="col">Release date:</th>
                    <th scope="col">Check it out:</th>
                    <th scope="col">Edit:</th>
                    <th scope="col">Delete:</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($comics as $comic)
                    <tr>
                        <th scope="row">{{ $comic->id }}</th>
                        <td>
                            <div class="poster-container">
                                <img src="{{ $comic->src }}
                                " alt="">
                            </div>
                        </td>
                        <td>{{ $comic->title }}</td>
                        <td>{{ $comic->price }}</td>
                        <td>{{ $comic->sale_date }}</td>
                        <td>
                            <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="btn btn-primary">
                                Check 
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('comics.show', ['comic' => $comic->id]) }}" class="btn btn-warning">
                                Edit
                            </a>
                        </td>
                        <td>
                            <form
                                action="{{ route('comics.destroy', ['comic' => $comic->id]) }}"
                                onsubmit="return confirm('Are you sure you want to delete this comic?')"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    Delete
                                </button> 
                            </from>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection