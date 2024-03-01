@extends('layouts.app')

@section('page-title', 'Comic Create')

@section('main-content')
<h1>
    Comic Create
</h1>

<div class="row">
    <div class="col py-4">
        <div class="mb-4">
            <a href="{{ route('comics.index') }}" class="btn btn-primary">
                Go back to Comic Home Page!
            </a>
        </div>
        
        <form action="{{ route('comics.update', ['comic' => $comic->id]) }}" method="POST">
            {{--
                C   Cross
                S   Site
                R   Request
                F   Forgery
            --}}
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="src" class="form-label">Poster</label>
                <input value="{{ $comic->src }}" type="text" class="form-control" id="src" name="src" placeholder="Add the poster..." maxlength="1024">
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
                <input value="{{ $comic->title }}" type="text" class="form-control" id="title" name="title" placeholder="Add the title..." maxlength="64" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input value="{{ $comic->description }}" type="text" class="form-control" id="description" name="description" placeholder="Write a description..." maxlength="100">
            </div>

            <div class="mb-3">
                <label for="comic-price" class="form-label">Comic price<span class="text-danger">*</span></label>
                <input value="{{ $comic->price }}" type="number" class="form-control" id="comic-price" name="comic-price" placeholder="How much is this comic?" min="1" max="20">
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">When was it released?<span class="text-danger">*</span></label>
                <input value="{{ $comic->sale_date }}" type="number" class="form-control" id="date" name="date" placeholder="Add the release date..." required>
            </div>

            <div>
                <button type="submit" class="btn btn-success w-100">
                    Update the comic!
                </button>
            </div>

        </form>
    </div>
</div>
@endsection