<?php

namespace App\Http\Controllers;

use App\Interfaces\AuthorRepositoryInterface;
use App\Interfaces\BookRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $_authorRepository;
    protected $_bookRepository;

    public function __construct(
        AuthorRepositoryInterface $authorRepository,
        BookRepositoryInterface $bookRepository
    ) {
        $this->_authorRepository = $authorRepository;
        $this->_bookRepository = $bookRepository;
    }

    /**
     * Display index view with the list of books.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('book.index', [
            'books' => $this->_bookRepository->getBooks()
        ]);
    }

    /**
     * Display new book view with the list of authors.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('book.create', [
            'authors' => $this->_authorRepository->getAuthors()
        ]);
    }

    /**
     * Store new book in the database.
     *
     * @param Request $request object containing the book data.
     * @throws Exception If an error occurs while creating the book.
     * @return \Illuminate\Http\RedirectResponse A redirect response to the previous page with a success or error message.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'title' => 'required|min:3|max:255',
                'author_id' => 'required|exists:authors,id',
            ]
        );

        try {
            $this->_bookRepository->create($request->all());
        } catch (Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage());
        }

        return redirect()->back()
            ->with('success', 'Book created successfully');
    }

    /**
     * Display the book edit view
     *
     * @param int $id The ID of the book to be edited.
     * @return \Illuminate\View\View
     */
    public function edit(int $id)
    {
        return view('book.edit', [
            'book' => $this->_bookRepository->getBookById($id),
            'authors' => $this->_authorRepository->getAuthors()
        ]);
    }

    /**
     * Update a book record in the database.
     *
     * @param Request $request object containing the book data.
     * @param int $id The ID of the book to be updated.
     * @throws Exception If an error occurs while updating the book.
     * @return \Illuminate\Http\RedirectResponse A redirect response to the previous page with a success or error message.
     */
    public function update(Request $request, int $id)
    {
        $request->validate(
            [
                'title' => 'required|min:3|max:255',
                'author_id' => 'required|exists:authors,id',
            ]
        );

        try {
            $this->_bookRepository->update($request->all(), $id);
        } catch (Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage());
        }

        return redirect()->back()
            ->with('success', 'Book updated successfully');
    }

    /**
     * Deletes a book with the given ID
     *
     * @param int $id The ID of the book to be deleted.
     * @throws Exception If an error occurs while deleting the book.
     * @return \Illuminate\Http\RedirectResponse A redirect response to the previous page with a success or error message.
     */
    public function destroy(int $id)
    {
        try {
            $this->_bookRepository->delete($id);
        } catch (Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage());
        }

        return redirect()->back()
            ->with('success', 'Book deleted successfully');
    }
}
