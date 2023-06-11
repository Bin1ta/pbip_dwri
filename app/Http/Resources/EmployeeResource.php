<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'name' => $this->name ?? '',
            'photo' => $this->photo ?? '',
            'level' => $this->level ?? '',
            'phone' => $this->phone ?? '',
            'email' => $this->email ?? '',
            'address' => $this->address ?? '',
            'department' => $this->department->title ?? '',
            'designation' => $this->designation->title ?? '',
            'office' => config('app.name') ?? ''
        ];
    }
}
