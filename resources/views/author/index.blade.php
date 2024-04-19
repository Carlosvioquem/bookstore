@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h1>Authors</h1>
        </div>
        <div class="row">
            <div class="col">
                <a class="btn btn-primary" href="{{ route('authors.create') }}">Create</a>
            </div>
        </div>
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @foreach ($authors as $author)
                    <tr>
                        <th scope="row">{{ $author->id }}</th>
                        <td>{{ $author->name }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('authors.edit', ['id' => $author->id]) }}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('authors.delete', ['id' => $author->id]) }}">Delete</a>
                        </td>
                @endforeach
            </table>

        </div>
    </div>
@endsection
