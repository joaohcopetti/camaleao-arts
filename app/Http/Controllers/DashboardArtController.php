<?php

namespace App\Http\Controllers;

use App\Actions\StoreCorelAsImageAction;
use App\Http\Requests\DashboardArtRequest;
use App\Http\Resources\ArtResource;
use App\Models\Art;
use App\Models\Category;
use Illuminate\Http\UploadedFile;
use Inertia\Inertia;
use Illuminate\Support\Str;

class DashboardArtController extends Controller
{
    public function index()
    {
        return Inertia::render('Dashboard/Arts/TheDashboardArts', [
            'arts' => ArtResource::collection(Art::latest()->paginate())
        ]);
    }

    public function create()
    {
        return Inertia::render('Dashboard/Arts/TheDashboardArtsCreate', [
            'categories' =>  Category::orderBy('name')->get()
        ]);
    }

    public function store(DashboardArtRequest $request)
    {
        $category = Category::find($request->category);

        $category->arts()->create([
            'name' => $request->name,
            'filepath' => $this->storeImage($request->file)
        ]);

        return redirect()->route('dashboard.arts.index');
    }

    public function storeImage(UploadedFile $file)
    {
        $extension  = pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
        $filename = Str::random() . '.' . $extension;
        $filepath = $file->storeAs(Art::$STORAGE_PATH, $filename);

        StoreCorelAsImageAction::execute($filepath);

        return $filepath;
    }
}
