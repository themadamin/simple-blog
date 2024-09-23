<?php

namespace Modules\Project\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'category_id' => $this->category_id,
            'title' => $this->title,
            'body' => $this->body,
            'published_at' => $this->published_at->format('Y-m-d'),
            'thumbnail' => $this->getFileUrl()
        ];
    }
}
