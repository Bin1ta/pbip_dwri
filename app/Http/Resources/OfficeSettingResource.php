<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfficeSettingResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'office_name' => $this->office_name ?? '',
            'office_phone' => $this->office_phone ?? '',
            'office_email' => $this->office_email ?? '',
            'office_address' => $this->office_address ?? '',
            'map_iframe' => $this->map_iframe ?? '',
            'officeSettingHeaders' => OfficeSettingHeaderResource::collection($this->officeSettingHeaders)
        ];
    }
}
