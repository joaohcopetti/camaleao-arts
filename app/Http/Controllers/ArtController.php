<?php

namespace App\Http\Controllers;

use App\Models\Art;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtController extends Controller
{
    public function getArt(string $filepath)
    {
        $imagePath = Art::imageFilepath($filepath);

        if (!Storage::exists($imagePath)) {
            abort(404);
        }

        return response()->file(Storage::path($imagePath));
    }

    public function downloadProject(Art $art)
    {
        return response()->download(
            Storage::path($art->filepath)
        );
    }

    public function downloadArt(Art $art)
    {
        return response()->download(
            Storage::path(Art::imageFilepath($art->filepath))
        );
    }
}
