<?php

namespace App\Interfaces;

interface AuthorRepositoryInterface
{
    public function getAuthors();
    public function getAuthorById(int $id);
    public function create(array $data);
    public function update(array $data, int $id);
    public function delete(int $id);
}
