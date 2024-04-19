@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>{{ __('Add new Book') }}</h1>
        </div>

        <div class="row">
            <form action="{{ route('books.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">{{ __('Title') }}</label>
                    <input type="title" class="form-control" id="title" name="title">
                    @error('title')
                        <div class="invalid-feedback" style="display: block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="author_id" class="form-label">{{ __('Author') }}</label>
                    <select type="author_id" class="form-select" id="author_id" name="author_id">
                        <option value="0">{{ __('Select Author') }}</option>
                        @foreach ($authors as $author)
                            <option value="{{ $author->id }}">{{ $author->name }}</option>
                        @endforeach
                    </select>
                    @error('author_id')
                        <div class="invalid-feedback" style="display: block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        </div>
    </div>
@endsection
