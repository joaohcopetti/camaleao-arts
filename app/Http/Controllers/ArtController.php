<?php

namespace App\Http\Controllers;

use App\Models\Art;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtController extends Controller
{
    public function index()
    {
        return 'index';
    }

    public function getImage(string $filename)
    {
        $filepath = Art::$STORAGE_PATH . "/$filename";

        if (!Storage::exists($filepath)) {
            abort(404);
        }

        return response()->file(Storage::path($filepath));
    }

    public function downloadImage(Art $art)
    {
        $filepath = Art::$STORAGE_PATH . "/$art->imageFilename";

        if (!Storage::exists($filepath)) {
            abort(404);
        }

        return response()->download(
            Storage::path($filepath),
            Str::slug($art->name) . '.' . pathinfo($filepath, PATHINFO_EXTENSION)
        );
    }

    public function downloadFile(Art $art)
    {
        $filepath = Art::$STORAGE_PATH . "/$art->filename";

        if (!Storage::exists($filepath)) {
            abort(404);
        }

        return response()->download(
            Storage::path($filepath),
            Str::slug($art->name) . '.' . pathinfo($filepath, PATHINFO_EXTENSION)
        );
    }
}
