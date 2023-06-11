<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubDivisionDocumentResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id ?? '',
            'title' => $this->title ?? '',
            'category' => $this->subDivisionDocumentCategory->title ?? '',
            'publisher' => $this->publisher ?? '',
            'date' => $this->date ?? '',
            'description' => $this->description ?? '',
            'files' => $this->when($request->routeIs('api.subDivisionDocumentDetail'), function () {
                return FileResource::collection($this->files);
            })
        ];
    }
}
