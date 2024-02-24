<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Art extends Model
{
    use HasFactory;
    use HasUuids;

    protected $table = 'arts';
    protected $fillable = [
        'name',
        'filepath'
    ];

    public static $STORAGE_PATH = 'artes';

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function filename(): Attribute
    {
        return Attribute::make(
            get: fn () => pathinfo($this->filepath, PATHINFO_BASENAME)
        );
    }

    public function imageFilename(): Attribute
    {
        return Attribute::make(
            get: fn () => pathinfo($this->filepath, PATHINFO_FILENAME) . '.png'
        );
    }
}
