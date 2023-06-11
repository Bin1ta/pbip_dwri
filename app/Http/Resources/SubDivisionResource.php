<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubDivisionResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'name' => $this->title ?? '',
            'email' => $this->email ?? '',
            'phone' => $this->phone ?? '',
            'slug' => $this->slug ?? '',
            'introduction' => $this->introduction ?? '',
        ];
    }
}
