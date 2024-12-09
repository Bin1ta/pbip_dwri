<?php

namespace App\Http\Requests\Administration;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdministrationRequest extends FormRequest
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
            'user_id' => ['nullable',Rule::exists('users', 'id')->withoutTrashed()],
            'remarks' => ['nullable', 'string'],
            'docs' => ['nullable', 'array'],
            'docs.*' => ['file', 'mimes:pdf,jpg,jpeg,png'],

        ];
    }

}
