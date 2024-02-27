<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArtResource;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        return Inertia::render('Category/TheCategory', [
            'category' => new CategoryResource($category),
            'arts' => ArtResource::collection($category->arts()->paginate())
        ]);
    }
}
