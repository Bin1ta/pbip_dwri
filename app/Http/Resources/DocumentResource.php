<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Route;

class DocumentResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'title' => $this->title ?? '',
            'published_date' => $this->published_date ? $this->published_date->toDateString() : '',
            'slug' => $this->slug ?? '',
            'description' => $this->description ?? '',
            'category' => $this->documentCategory ? ($this->documentCategory->title ?? '') : ($this->mainDocumentCategory->title ?? ''),
            $this->mergeWhen(Route::is('api.documentDetail'), [
                'files' => FileResource::collection($this->files)
            ])
        ];
    }
}
