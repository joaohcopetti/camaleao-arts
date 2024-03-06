<?php

namespace App\Http\Resources;

use App\Models\Art;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
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
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'category' => new CategoryResource($this->category),
            'image_url' => route('arts.image', ['filename' => $this->image_filepath]),
            'image_download_url' => route('arts.image-download', $this),
            'file_download_url' => route('arts.file-download', $this),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
