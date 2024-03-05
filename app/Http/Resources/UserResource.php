<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'email' => $this->email,
            'permissions' => $this->when(
                $this->has_roles,
                $this->getAllPermissions()->pluck('name')
            ),
            'expire_at' => $this->expire_at,
            'has_valid_subscription' => $this->hasValidSubscription,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
