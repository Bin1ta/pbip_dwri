<?php

namespace App\Http\Requests\CommitteeCategory;

use App\Enums\ProjectTypeEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class UpdateCommitteeCategoryRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'title_en' => ['required', 'string'],
            'place' => ['required',new Enum(ProjectTypeEnum::class)]
        ];
    }
}
