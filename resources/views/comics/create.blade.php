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

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $errors }}</li>
                    @endforeach
                </ul>
            </div> 
        @enderror
        
        <form action="{{ route('comics.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="src" class="form-label">Poster</label>
                <input type="text" class="form-control" id="src" name="src" placeholder="Add the poster..." maxlength="1024">
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Add the title..." maxlength="64" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Write a description..." maxlength="4000">
            </div>

            <div class="mb-3">
                <label for="comic-price" class="form-label">Comic price<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="comic-price" name="comic-price" placeholder="How much is this comic?" min="1" max="20" required>
            </div>

            <div class="mb-3">
                <label for="comic-genre" class="form-label">Comic genre</label>
                <input type="text" class="form-control" id="comic-genre" name="comic-genre" placeholder="What is its genre?" min="1" max="20">
            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">When was it released?<span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="sale_date" name="sale_date" placeholder="Add the release date..." required>
            </div>

            <div class="mb-3">
                <label for="artists" class="form-label">Who are the artists?</label>
                <input type="text" class="form-control" id="artists" name="artists" placeholder="Write the artists...">
            </div>

            <div class="mb-3">
                <label for="writers" class="form-label">Who are the writers?</label>
                <input type="text" class="form-control" id="writers" name="writers" placeholder="Write the writers...">
            </div>

            <div>
                <button type="submit" class="btn btn-success w-100">
                    + Add new comic 
                </button>
            </div>

        </form>
    </div>
</div>
@endsection