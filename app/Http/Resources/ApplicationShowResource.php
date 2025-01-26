<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationShowResource extends JsonResource
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
            'description' => $this->description,
            'published_at' => optional($this->published_at)->format('Y-m-d'),
            'author' => new AuthorResource($this->author),
            'categories' => CategoryResource::collection($this->categories)
        ];
    }
}
