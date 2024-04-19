@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Edit Book</h1>
        </div>

        <div class="row">
            <form action="{{ route('books.update', ['id' => $book->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="title" class="form-control" id="title" name="title" value="{{ $book->title }}">
                    @error('title')
                        <div class="invalid-feedback" style="display: block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="author_id" class="form-label">Author</label>
                    <select type="author_id" class="form-select" id="author_id" name="author_id">
                        <option value="0">Select Author</option>
                        @foreach ($authors as $author)
                            <option @if ($author->id == $book->author_id) selected @endif value="{{ $author->id }}">
                                {{ $author->name }}</option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <div class="invalid-feedback" style="display: block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
@endsection
