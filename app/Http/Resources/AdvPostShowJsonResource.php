<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdvPostShowJsonResource extends JsonResource
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
            'title' => $this->title,
            'description' => $this->description,
            'price' => $this->price,
            'category_id' => $this->category_id,
            'user_id' => $this->user_id,
            'published_at' => $this->published_at,
            'updated_at' => $this->updated_at,
            'category_title' => $this->category->title,
            'user_name' => $this->user->name,
            'created_at' => $this->created_at,
            'deleted_at' => $this->deleted_at
        ];
    }
}
