<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Http\Resources\Movie\MovieCollection;
use App\Http\Resources\Movie\MovieResource;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MovieController extends Controller
{
    public function index(Request $request): MovieCollection
    {
        $movies = Movie::paginate($request->perPage());

        return MovieCollection::make($movies);
    }

    public function store(StoreMovieRequest $request): MovieResource
    {
        $movie = Movie::create([
            'title' => $request->title,
            'description' => $request->description,
            'age_rating' => $request->ageRating,
            'language' => $request->language,
        ]);

        return MovieResource::make($movie);
    }

    public function show(Movie $movie): MovieResource
    {
        return MovieResource::make($movie);
    }

    public function update(UpdateMovieRequest $request, Movie $movie): MovieResource
    {
        $movie->update([
            'title' => $request->title,
            'description' => $request->description,
            'age_rating' => $request->ageRating,
            'language' => $request->language,
        ]);

        return MovieResource::make($movie);
    }

    public function destroy(Movie $movie): Response
    {
        $movie->delete();

        return response()->noContent();
    }
}
