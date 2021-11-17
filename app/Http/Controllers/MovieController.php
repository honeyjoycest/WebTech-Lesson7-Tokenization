<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Repositories\MovieRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use http\Client\Response;

class MovieController extends AppBaseController
{
    /** @var  MovieRepository */
    private $movieRepository;

    public function __construct(MovieRepository $movieRepo)
    {
        $this->movieRepository = $movieRepo;
    }

    /**
     * Display a listing of the Movie.
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $movies = $this->movieRepository->all();

        return view('movies.index')
            ->with('movies', $movies);
    }

    /**
     * Show the form for creating a new Movie.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created Movie in storage.
     *
     * @param CreateMovieRequest $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateMovieRequest $request)
    {
        $input = $request->all();

        $movie = $this->movieRepository->create($input);

        Flash::success('Movie saved successfully.');

        return redirect(route('movies.index'));
    }

    /**
     * Display the specified Movie.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $movie = $this->movieRepository->find($id);

        if (empty($movie)) {
            Flash::error('Movie not found');

            return redirect(route('movies.index'));
        }

        return view('movies.show')->with('movie', $movie);
    }

    /**
     * Show the form for editing the specified Movie.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $movie = $this->movieRepository->find($id);

        if (empty($movie)) {
            Flash::error('Movie not found');

            return redirect(route('movies.index'));
        }

        return view('movies.edit')->with('movie', $movie);
    }

    /**
     * Update the specified Movie in storage.
     *
     * @param int $id
     * @param UpdateMovieRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateMovieRequest $request)
    {
        $movie = $this->movieRepository->find($id);

        if (empty($movie)) {
            Flash::error('Movie not found');

            return redirect(route('movies.index'));
        }

        $movie = $this->movieRepository->update($request->all(), $id);

        Flash::success('Movie updated successfully.');

        return redirect(route('movies.index'));
    }

    /**
     * Remove the specified Movie from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     *
     */
    public function destroy($id)
    {
        $movie = $this->movieRepository->find($id);

        if (empty($movie)) {
            Flash::error('Movie not found');

            return redirect(route('movies.index'));
        }

        $this->movieRepository->delete($id);

        Flash::success('Movie deleted successfully.');

        return redirect(route('movies.index'));
    }
}
