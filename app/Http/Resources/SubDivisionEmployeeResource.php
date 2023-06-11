<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubDivisionEmployeeResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'name' => $this->name ?? '',
            'photo' => $this->photo ?? '',
            'designation' => $this->designation ?? '',
            'department' => $this->department ?? '',
            'level' => $this->level ?? '',
            'phone' => $this->phone ?? '',
            'email' => $this->email ?? '',
            'address' => $this->address ?? '',
        ];
    }
}
