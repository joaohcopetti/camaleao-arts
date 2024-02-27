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
        return Inertia::render('Dashboard/Art/TheDashboardArts', [
            'arts' => ArtResource::collection(Art::latest()->paginate())
        ]);
    }

    public function create()
    {
        return Inertia::render('Dashboard/Art/TheDashboardArtsCreate', [
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

    public function edit(Art $art)
    {
        return Inertia::render('Dashboard/Art/TheDashboardArtsEdit', [
            'art' => new ArtResource($art)
        ]);
    }

    public function update(DashboardArtRequest $request, Art $art)
    {
        $art->name = $request->name;
        $art->category()->associate($request->category);

        if ($request->file) {
            $art->deleteFile();
            $art->filepath = $this->storeImage($request->file);
        }

        $art->save();

        return redirect()->route('dashboard.arts.index');
    }
}
