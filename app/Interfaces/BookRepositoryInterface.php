<?php

namespace App\Interfaces;

interface BookRepositoryInterface
{
    public function getBooks();
    public function getBookById(int $id);
    public function create(array $data);
    public function update(array $data, int $id);
    public function delete(int $id);
}
