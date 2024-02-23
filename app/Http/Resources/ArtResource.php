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
            // 'filepath' => $this->filepath,
            'category' => new CategoryResource($this->category),
            'image_filepath' => route('images.get', ['filepath' => $this->filepath]),
            'image_download_url' => route('images.download', ['art' => $this->id]),
            'filepath_download_url' => route('images.download-project', ['art' => $this->id]),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
