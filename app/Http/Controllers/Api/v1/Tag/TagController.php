<?php

namespace App\Http\Controllers\Api\v1\Tag;

use App\Http\Controllers\Controller;
use App\Http\Resources\Tag\TagResource;
use App\Models\TagManagement\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function getAll()
    {
        $model = Tag::all();
        return TagResource::collection($model);
    }
}
