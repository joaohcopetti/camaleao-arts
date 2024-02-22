<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Inertia\Inertia;

class DashboardArtController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard/Arts/TheDashboardArts');
    }

    public function create()
    {
        return Inertia::render('Dashboard/Arts/TheDashboardArtsCreate', [
            'categories' => Category::orderBy('name')->get()
        ]);
    }

    public function store($request)
    {
        dd($request);
    }
}
