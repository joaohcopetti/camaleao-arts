<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Art extends Model
{
    use HasFactory;

    protected static $STORAGE_PATH = 'app/artes';

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
