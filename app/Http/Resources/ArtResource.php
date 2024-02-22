<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ArtResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'filepath' => $this->filepath,
            'category' => new CategoryResource($this->category),
            'image_filepath' => Str::replace('.cdr', '.png', $this->filepath)
        ];
    }
}
