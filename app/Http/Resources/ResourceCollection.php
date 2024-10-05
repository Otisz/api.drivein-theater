<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection as BaseResourceCollection;

abstract class ResourceCollection extends BaseResourceCollection
{
    public static $wrap = 'payload';

    public $additional = ['message' => null];
}
