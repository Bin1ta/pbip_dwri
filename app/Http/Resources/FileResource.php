<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FileResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'file' => asset('storage/' . $this->url),
            'extension' => $this->extension ?? '',
            'original_name' => $this->original_name ?? ''
        ];
    }
}
