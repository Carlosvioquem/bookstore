@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>{{ __('Books') }}</h1>
        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-primary" href="{{ route('books.create') }}">{{ __('Create') }}</a>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">{{ __('Title') }}</th>
                        <th scope="col">{{ __('Author') }}</th>
                        <th scope="col">{{ __('Action') }}</th>
                    </tr>
                </thead>
                @foreach ($books as $book)
                    <tr>
                        <th scope="row">{{ $book->id }}</th>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author->name }}</td>
                        <td>
                            <a class="btn btn-primary"
                                href="{{ route('books.edit', ['id' => $book->id]) }}">{{ __('Edit') }}</a>
                            <a class="btn btn-danger"
                                href="{{ route('books.delete', ['id' => $book->id]) }}">{{ __('Delete') }}</a>
                        </td>
                @endforeach
            </table>

        </div>
    </div>
@endsection
