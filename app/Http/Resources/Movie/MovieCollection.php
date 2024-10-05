<?php

namespace App\Http\Resources\Movie;

use App\Http\Resources\ResourceCollection;

class MovieCollection extends ResourceCollection
{
    public $collects = MovieResource::class;
}
