<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'title' => $this->title ?? '',
            'photo' => $this->photo ?? ''
        ];
    }
}
