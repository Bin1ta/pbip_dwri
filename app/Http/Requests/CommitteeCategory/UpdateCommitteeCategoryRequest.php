<?php

namespace App\Http\Requests\CommitteeCategory;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommitteeCategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'name_en' => ['required', 'string'],
        ];
    }
}
