<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImportantLinkResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'title' => $this->title ?? '',
            'url' => $this->url ?? ''
        ];
    }
}
