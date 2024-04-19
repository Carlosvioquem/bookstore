<?php

namespace App\Repositories;

use App\Interfaces\AuthorRepositoryInterface;
use App\Models\Author;

class AuthorRepository implements AuthorRepositoryInterface
{
    /**
     * Retrieves all authors from the database.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAuthors()
    {
        return Author::all();
    }

    /**
     * Retrieves an author by their ID from the database.
     *
     * @param int $id The ID of the author to retrieve.
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException If the author with the given ID is not found.
     * @return \App\Models\Author The author with the given ID.
     */
    public function getAuthorById(int $id)
    {
        return Author::findOrFail($id);
    }

    /**
     * Creates a new author record in the database.
     *
     * @param array $data The data for the new author.
     * @return \App\Models\Author The newly created author instance.
     */
    public function create(array $data)
    {
        return Author::create($data);
    }

    /**
     * Updates an author record in the database.
     *
     * @param array $data The updated author data.
     * @param int $id The ID of the author to update.
     * @return \App\Models\Author The updated author instance.
     */
    public function update(array $data, int $id)
    {
        $author = $this->getAuthorById($id);
        $author->update($data);
        return $author;
    }

    /**
     * Deletes an author record by ID.
     *
     * @param int $id The ID of the author to delete.
     */
    public function delete(int $id)
    {
        $author = $this->getAuthorById($id);
        $author->delete();
    }
}
