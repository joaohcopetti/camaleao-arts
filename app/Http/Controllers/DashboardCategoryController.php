<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardCategoryController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard/Category/TheDashboardCategory');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => ['required']]);

        Category::create(['name' => $request->name]);

        return redirect()->route('dashboard.categories.index');
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(['name' => ['required']]);

        $category->update(['name' => $request->name]);

        return redirect()->back();
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->back();
    }
}
