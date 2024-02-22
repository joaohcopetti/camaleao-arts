<?php

namespace App\Actions;

use Illuminate\Support\Arr;

class StoreCorelAsImageAction
{
    public static $INKSCAPE_RUN_PATH = '/tools/inkscape/AppRun';

    public static function execute(string $cdrFilepath): string
    {
        $inkscapePath = base_path(static::$INKSCAPE_RUN_PATH);

        $cdrPath = storage_path('/app/' . $cdrFilepath);
        $imagePath = storage_path('/app/' . static::replaceExtension($cdrFilepath, 'png'));

        exec("$inkscapePath $cdrPath -o $imagePath");

        return $imagePath;
    }

    public static function replaceExtension(string $filepath, string $newExtension): string
    {
        $fileStrippedExtension = Arr::first(explode('.', $filepath));

        return $fileStrippedExtension . '.' . $newExtension;
    }
}
