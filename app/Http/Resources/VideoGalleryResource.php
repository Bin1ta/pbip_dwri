<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoGalleryResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'title' => $this->title ?? '',
            'url' => $this->url ?? ''
        ];
    }
}
