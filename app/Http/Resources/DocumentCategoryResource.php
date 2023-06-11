<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DocumentCategoryResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'title' => $this->title ?? '',
            'slug' => $this->slug ?? ''
        ];
    }
}
