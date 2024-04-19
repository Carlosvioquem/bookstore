<?php

namespace App\Http\Controllers;

use App\Interfaces\AuthorRepositoryInterface;
use Exception;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    protected $_authorRepository;

    public function __construct(
        AuthorRepositoryInterface $authorRepository
    ) {
        $this->_authorRepository = $authorRepository;
    }

    /**
     * Display index view with the list of authors.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('author.index', [
            'authors' => $this->_authorRepository->getAuthors(),
        ]);
    }

    /**
     * Display new author view.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a new author.
     *
     * @param Request $request object containing the author data.
     * @throws Exception If there is an error creating the author.
     * @return RedirectResponse The redirect response back to the previous page with a success or error message.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:3|max:255',
            ]
        );

        try {
            $this->_authorRepository->create($request->all());
        } catch (Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage());
        }

        return redirect()->back()
            ->with('success', 'Author created successfully');
    }


    /**
     * Display the author edit view
     *
     * @param int $id The ID of the author to edit.
     * @return \Illuminate\Contracts\View\View The view for editing the author.
     */
    public function edit(int $id)
    {
        return view('author.edit', [
            'author' => $this->_authorRepository->getAuthorById($id),
        ]);
    }

    /**
     * Update an author record in the database.
     *
     * @param Request $request object containing the updated author data.
     * @param int $id The ID of the author to be updated.
     * @throws Exception If there is an error updating the author.
     * @return RedirectResponse The redirect response back to the previous page with a success or error message.
     */
    public function update(Request $request, int $id)
    {
        $request->validate(
            [
                'name' => 'required|min:3|max:255',
            ]
        );

        try {
            $this->_authorRepository->update($request->all(), $id);
        } catch (Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage());
        }

        return redirect()->back()
            ->with('success', 'Author updated successfully');
    }

    /**
     * Deletes an author with the given ID.
     *
     * @param int $id The ID of the author to delete.
     * @throws Exception If there is an error deleting the author.
     * @return RedirectResponse The redirect response back to the previous page with a success or error message.
     */
    public function destroy(int $id)
    {
        try {
            $this->_authorRepository->delete($id);
        } catch (Exception $exception) {
            return redirect()->back()
                ->with('error', $exception->getMessage());
        }

        return redirect()->back()
            ->with('success', 'Author deleted successfully');
    }
}
