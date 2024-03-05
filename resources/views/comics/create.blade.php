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
                <input type="text" class="form-control @error('src') is-invalid @enderror" id="src" name="src" placeholder="Add the poster..." maxlength="1024" value="{{ old('src')
                 }}">
                @error('src')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" placeholder="Add the title..." required maxlength="64"  value="{{ old('title')
                }}">
                @error('title')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
           @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description" placeholder="Write a description..." maxlength="4000" value="{{ old('description')
                }}">
                @error('description')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="comic-price" class="form-label">Comic price<span class="text-danger">*</span></label>
                <input type="text" class="form-control @error('comic-price') is-invalid @enderror" id="comic-price" name="comic-price" placeholder="How much is this comic?" min="1" max="20" required value="{{ old('comic-price')
                }}">
                @error('comic-price')
                <div class="alert alert-danger">
                   {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="comic-genre" class="form-label">Comic genre</label>
                <input type="text" class="form-control @error('comic-genre') is-invalid @enderror" id="comic-genre" name="comic-genre" placeholder="What is its genre?" min="1" max="20" value="{{ old('comic-genre')
                }}">
                @error('comic-genre')
                <div class="alert alert-danger">
                   {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="sale_date" class="form-label">When was it released?<span class="text-danger">*</span></label>
                <input type="date" class="form-control @error('sale_date') is-invalid @enderror" id="sale_date" name="sale_date" placeholder="Add the release date..." required value="{{ old('sale_date')
                }}">
                @error('sale_date')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type" class="form-label">What's the book type?</label>
                <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" placeholder="Add the type..." value="{{ old('type')
                }}">
                @error('type')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="artists" class="form-label">Who are the artists?</label>
                <input type="text" class="form-control @error('artists') is-invalid @enderror" id="artists" name="artists" placeholder="Write the artists..." value="{{ old('artists')
                }}">
                @error('artists')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="writers" class="form-label">Who are the writers?</label>
                <input type="text" class="form-control @error('writers') is-invalid @enderror" id="writers" name="writers" placeholder="Write the writers..." value="{{ old('writers')
                }}">
                @error('writers')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
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