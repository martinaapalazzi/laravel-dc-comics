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
                <label for="type" class="form-label">Description</label>
                <input type="text" class="form-control" id="type" name="type" placeholder="Write a description..." maxlength="100">
            </div>

            <div class="mb-3">
                <label for="cooking-time" class="form-label">Comic price<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="cooking-time" name="cooking_time" placeholder="How much is this comic?" min="1" max="20">
            </div>

            <div class="mb-3">
                <label for="weight" class="form-label">When was it released?<span class="text-danger">*</span></label>
                <input type="number" class="form-control" id="weight" name="weight" placeholder="Add the release date..." required>
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