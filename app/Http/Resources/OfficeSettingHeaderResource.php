<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfficeSettingHeaderResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'header_name' => $this->nepali ?? '',
            'font_color' => $this->font_color ?? '',
            'font_size' => $this->font_size ?? '',
            'font_family' => $this->font_family ?? '',
        ];
    }
}
