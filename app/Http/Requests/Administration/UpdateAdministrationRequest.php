<?php

namespace App\Http\Requests\Administration;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdministrationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['nullable', 'string', 'max:255'],
            'date' => ['nullable', 'string'],
            'photo' => ['nullable','mimes:jpeg,png,jpg,gif,svg,pdf'],
            'remarks' => ['nullable', 'string'],
        ];
    }

}
