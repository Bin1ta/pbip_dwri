<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfficeDetailResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'title' => $this->title ?? '',
            'description' => $this->description ?? ''
        ];
    }
}
