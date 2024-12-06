<?php

namespace App\Http\Requests\Administration;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdministrationRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'date' => ['required', 'string'],
            'photo' => ['required', 'mimes:jpeg,png,jpg,gif,svg,pdf'],
            'remarks' => ['nullable', 'string'],
        ];
    }

}
