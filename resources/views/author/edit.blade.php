@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Edit Author</h1>
        </div>

        <div class="row">
            <form action="{{ route('authors.update', ['id' => $author->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $author->name }}">
                    @error('name')
                        <div class="invalid-feedback" style="display: block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
@endsection
