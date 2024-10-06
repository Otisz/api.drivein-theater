<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateMovieCoverRequest;
use App\Http\Resources\Movie\MovieResource;
use App\Models\Movie;

class MovieCoverController extends Controller
{
    public function __invoke(UpdateMovieCoverRequest $request, Movie $movie): MovieResource
    {
        $path = $request->cover->storeAs('covers', "{$movie->getKey()}.{$request->cover->extension()}");

        $movie->update([
            'cover_path' => $path,
        ]);

        return MovieResource::make($movie);
    }
}
