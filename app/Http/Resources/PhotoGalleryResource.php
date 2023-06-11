<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PhotoGalleryResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'title' => $this->title ?? '',
            'slug' => $this->slug ?? '',
            'cover_photo' => asset('storage/' . ($this->photos->first()->images ?? '')),
            'photos' => $this->when($request->routeIs('api.photoGalleryDetails'), function () {
                return PhotoResource::collection($this->photos);
            })
        ];
    }
}
