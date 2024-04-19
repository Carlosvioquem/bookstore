<?php

namespace App\Repositories;

use App\Interfaces\BookRepositoryInterface;
use App\Models\Book;

class BookRepository implements BookRepositoryInterface
{
    /**
     * Retrieve all books from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getBooks()
    {
        return Book::all();
    }

    /**
     * Retrieves a book by its ID.
     *
     * @param int $id The ID of the book to retrieve.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the book with the given ID is not found.
     * @return \App\Models\Book The book with the given ID.
     */
    public function getBookById(int $id)
    {
        return Book::findOrFail($id);
    }

    /**
     * Creates a new book record in the database.
     *
     * @param array $data The data for the new book.
     * @return \App\Models\Book The newly created book instance.
     */
    public function create(array $data)
    {
        return Book::create($data);
    }

    /**
     * Updates a book record in the database.
     *
     * @param array $data The updated book data.
     * @param int $id The ID of the book to update.
     * @return \App\Models\Book The updated book instance.
     */
    public function update(array $data, int $id)
    {
        $book = $this->getBookById($id);
        $book->update($data);
        return $book;
    }

    /**
     * Deletes a book from the database.
     *
     * @param int $id The ID of the book to delete.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the book with the given ID is not found.
     * @return void
     */
    public function delete(int $id)
    {
        $book = $this->getBookById($id);
        $book->delete();
    }
}
