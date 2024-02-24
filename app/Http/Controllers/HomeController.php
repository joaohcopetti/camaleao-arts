<?php

namespace App\Http\Controllers;

use App\Actions\SyncUserRolesAction;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Home/TheHome', [
            'categories' => CategoryResource::collection(Category::all())
        ]);
    }
}
